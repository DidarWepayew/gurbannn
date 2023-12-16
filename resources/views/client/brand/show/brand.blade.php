<img src="{{ $obj->image ? Storage::url($obj->image) : asset('img/brand.jpg') }}" class="img-fluid" alt="">
<div class="text-bg-dark my-3">
    <div class="fs-3">{{ $obj->name }}</div>
</div>