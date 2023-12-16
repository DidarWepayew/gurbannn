<div class="border rounded p-sm-1 h-100">
    <img src="{{ count($product->images) > 0 ? Storage::url($product->images[0]) : asset('img/product.jpg') }}" class="img-fluid" alt="">
    <a href="{{ route('products.show', $product->slug) }}" class="link-dark stretched-link text-decoration-none">
        {{ $product->name }}
    </a>
</div>