<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaticFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class StaticFileController extends Controller
{
    public string $roleKey = 'file';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = StaticFile::all();
        return view('admin.pages.static_file.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StaticFile $staticFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaticFile $staticFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaticFile $staticFile)
    {
        // MIME tipine göre kurallar
        if (Str::startsWith($staticFile->mime_type, 'image/')) {
            $rules = ['file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120'];
        } elseif (Str::startsWith($staticFile->mime_type, 'video/')) {
            $rules = ['file' => 'nullable|mimetypes:video/mp4,video/webm,video/ogg|max:51200'];
        } else {
            $mainType = explode('/', $staticFile->mime_type)[0] ?? null;

            if ($mainType) {
                $rules = ['file' => 'nullable|mimetypes:'.$staticFile->mime_type];
            } else {
                return redirect()->back()->with('error','Tanımsız Dosya Türü')->withInput();
            }
        }

        $validated = $request->validate($rules);

        if ($request->hasFile('file')) {
            $uploaded = $request->file('file');
            $uploadedMime = $uploaded->getMimeType();

            // Eğer kayıt image/* ise ve yüklenen mime farklıysa convert et
            if (Str::startsWith($staticFile->mime_type, 'image/')) {
                if ($uploadedMime !== $staticFile->mime_type) {
                    // resim convert
                    $ext = explode('/', $staticFile->mime_type)[1]; // jpeg, png, webp...
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($uploaded->getRealPath());

                    switch ($ext) {
                        case 'jpg':
                        case 'jpeg':
                            $encoded = $image->toJpeg();
                            break;
                        case 'png':
                            $encoded = $image->toPng();
                            break;
                        case 'webp':
                            $encoded = $image->toWebp();
                            break;
                        case 'gif':
                            $encoded = $image->toGif();
                            break;
                        default:
                            throw new \Exception("Desteklenmeyen resim formatı: $ext");
                    }

                    // public_path ile mutlak dosya yolu
                    $fullPath = public_path(ltrim($staticFile->file_path, '/'));

                    if (!file_exists(dirname($fullPath))) {
                        mkdir(dirname($fullPath), 0755, true);
                    }

                    // eski dosyanın üstüne yaz
                    file_put_contents($fullPath, (string) $encoded);
                } else {
                    // aynı mime -> direkt üzerine yaz
                    $fullPath = public_path(ltrim($staticFile->file_path, '/'));
                    if (!file_exists(dirname($fullPath))) {
                        mkdir(dirname($fullPath), 0755, true);
                    }
                    $uploaded->move(dirname($fullPath), basename($fullPath));
                }

            } elseif (Str::startsWith($staticFile->mime_type, 'video/')) {
                $fullPath = public_path(ltrim($staticFile->file_path, '/'));

                if ($uploadedMime === $staticFile->mime_type) {
                    // aynı mime -> direkt üzerine yaz
                    if (!file_exists(dirname($fullPath))) {
                        mkdir(dirname($fullPath), 0755, true);
                    }
                    $uploaded->move(dirname($fullPath), basename($fullPath));
                } else {
                    // farklı mime -> ffmpeg ile convert et
                    $ext = explode('/', $staticFile->mime_type)[1]; // mp4, webm, ogg
                    if (!file_exists(dirname($fullPath))) {
                        mkdir(dirname($fullPath), 0755, true);
                    }

                    // geçici yükleme dosyasını ffmpeg ile convert et
                    $cmd = sprintf(
                        'ffmpeg -i %s -c:v libx264 -crf 23 -preset fast -c:a aac %s -y',
                        escapeshellarg($uploaded->getRealPath()),
                        escapeshellarg($fullPath)
                    );
                    exec($cmd);
                }

            } else {
                // diğer dosyalar -> storage/public içine yaz
                $relativePath = str_replace('/storage/', '', $staticFile->file_path);
                Storage::disk('public')->putFileAs(
                    dirname($relativePath),
                    $uploaded,
                    basename($relativePath)
                );
            }
        }

        $staticFile->alt = $request->alt;
        $staticFile->save();

        return back()->with('success','Dosya güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaticFile $staticFile)
    {
        //
    }
}
