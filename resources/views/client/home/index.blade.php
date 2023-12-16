@extends('client.layouts.app')
@section('title')@lang('app.appName')@endsection
@section('content')
    <div class="container-xl text-center py-3">
        <div class="row g-3 g-sm-4">
            <div class="col-md-4">
                @include('client.home.index.brands')
            </div>
            <div class="col">
                @include('client.home.index.products')
            </div>
        </div>
    </div>
@endsection