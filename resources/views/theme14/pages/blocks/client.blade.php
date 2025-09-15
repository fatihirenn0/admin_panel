<!-- Brand area start here -->
<div class="brand-area">
    <div class="row g-0">
        @foreach($allReferences as $indexReference)
            <div class="col-6 col-lg-2">
                <div class="brand__item"><img src="/storage/{{ $indexReference->image }}" alt="{{ $indexReference->name }}"></div>
            </div>
        @endforeach
    </div>
</div>
<!-- Brand area end here -->
