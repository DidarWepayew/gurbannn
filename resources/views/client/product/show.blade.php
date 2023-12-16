@extends('client.layouts.app')
@section('title'){{ $obj->name }} - {{ $obj->brand->name }} - @lang('app.appName')@endsection
@section('content')
    <div class="container-xl text-center py-3">
        <div class="row g-3 g-sm-4">
            <div class="col-md-4">
                @include('client.home.index.brands')
            </div>
            <div class="col">
                @include('client.product.show.product')
                @include('client.product.show.review')
            </div>
        </div>
    </div>
@endsection