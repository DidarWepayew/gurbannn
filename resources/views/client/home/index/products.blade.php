<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-2 g-sm-3">
    @foreach($products as $product)
        <div class="col position-relative">
            @include('client.app.product')
        </div>
    @endforeach
</div>