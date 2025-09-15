<section class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading_common text-center">
                    <h5>{{ __('Projelerimiz') }}</h5>
                    <h3>{{ __('Başarıyla Tamamlanan Hukuki Süreçler') }}</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="effect-classic">
    <div class="container-fluid">
        <div class="portfolio-filters-content">
            <div class="filters-button-group">
                <button class="button is-checked" data-filter="*">{{ __('Tümü') }}</button>
                @foreach($allProjectCategories as $indexProjectCategory)
                    <button class="button" data-filter=".cat{{ $indexProjectCategory->id }}">{{ $indexProjectCategory->name }}</button>
                @endforeach
            </div>
        </div>
        <div class="grid grid-4 gutter-20 clearfix">
            @foreach($allProjects as $indexProject)
                <div class="grid-item @foreach($indexProject->categories as $singleProjectCategory) cat{{ $singleProjectCategory->id }}  @endforeach ">
                    <div class="thumb">
                        <img class="item_image" src="/storage/{{ $indexProject->image }}" alt="{{ $indexProject->name }}" />
                        <div class="works-info works_info_bg">
                            <div class="label-text">
                                <h6><a href="{{ route(getResourceFullLink('projects','show'),$indexProject) }}">{{ $indexProject->name }}</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
