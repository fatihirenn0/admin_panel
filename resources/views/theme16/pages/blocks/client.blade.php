<section class="patner_two_section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="patner_flex">
                    @foreach($allReferences as $indexReference)
                        <div class="patner_2">
                        <img src="/storage/{{ $indexReference->image }}" alt="{{ $indexReference->name }}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
