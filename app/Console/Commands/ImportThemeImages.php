<?php

namespace App\Console\Commands;

use App\Models\StaticFile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\DomCrawler\Crawler;

class ImportThemeImages extends Command
{
    protected $signature = 'images:import-theme {theme : resources/views içindeki tema klasör adı}';
    protected $description = 'Belirtilen tema klasöründeki tüm blade dosyalarından static-image classına sahip <img> src bilgilerini kaydeder';

    public function handle()
    {
        $theme = $this->argument('theme');
        $path = resource_path("views/{$theme}");

        if (!File::isDirectory($path)) {
            $this->error("Tema klasörü bulunamadı: {$path}");
            return Command::FAILURE;
        }

        $files = File::allFiles($path);
        $count = 0;
        StaticFile::truncate();
        foreach ($files as $file) {
            if ($file->getExtension() !== 'php') {
                continue; // sadece blade.php dosyaları
            }

            $html = File::get($file->getRealPath());
            $crawler = new Crawler($html);

            $crawler->filter('img.static-image')->each(function ($node) use (&$count, $file, $theme) {
                $src = $node->attr('src');
                $alt = $node->attr('alt');

                if ($src) {
                    // Varsayılan mime
                    $mime = null;

                    // Eğer src mutlak URL değilse dosya yolunu yakala
                    $cleanSrc = trim($src, "/");
                    $localPath = public_path($cleanSrc);

                    if (File::exists($localPath)) {
                        $mime = File::mimeType($localPath);
                    }

                    $originalName = str_replace(["{{__('","')}}","{{ __('","') }}"], '', $alt);
                    $staticFile = new StaticFile();
                    $staticFile->theme_key = $theme;
                    $staticFile->file_path = $src;
                    $staticFile->mime_type = $mime ?? 'unknown';
                    $staticFile->name = $originalName;
                    $staticFile->alt = ['tr' => $originalName];
                    $staticFile->save();
                    $count++;
                }
            });

        }

        $this->info("Toplam {$count} adet static-image bulundu ve kaydedildi.");
        return Command::SUCCESS;
    }
}
