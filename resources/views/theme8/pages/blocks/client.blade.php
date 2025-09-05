<!-- Clients -->
<div class="mcgill-clients clients">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 owl-carousel owl-theme">
                @foreach($references as $reference)
                    <div class="client-logo">
                    <a href=/storage/{{ $reference->image }}"><img src="/storage/{{ $reference->image }}" alt="{{ $reference->name }}"></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
