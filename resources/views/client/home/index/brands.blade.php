<div class="row row-cols-3 row-cols-sm-4 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-1 g-sm-2">
    @foreach($brands as $brand)
        <div class="col position-relative">
            <div class="text-bg-secondary p-sm-1 h-100">
                <a href="{{ route('brands.show', $brand->slug) }}" class="small link-light stretched-link text-decoration-none">
                    {{ $brand->name }}
                </a>
            </div>
        </div>
    @endforeach
</div>