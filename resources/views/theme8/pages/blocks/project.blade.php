<!-- Case Studies -->
<div class="mcgill-cases">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-40 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">{{ __('Projelerimiz') }}</span>
                <h2 class="mcgill-heading">{{ __('Başarıyla Tamamlanan Hukuki Süreçler') }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($allProjects as $indexProject)
                <div class="col-md-4">
                    <div class="item">
                        <div class="position-re o-hidden"><img src="/storage/{{ $indexProject->image }}" alt="{{ $indexProject->name }}" /></div>
                        <div class="con">
                            <a href="{{ route(getResourceFullLink('projects')) }}">
                                <h5>{{ $indexProject->name }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
