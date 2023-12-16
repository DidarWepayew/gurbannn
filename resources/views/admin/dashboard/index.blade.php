@extends('admin.layouts.app')
@section('title')@lang('app.dashboard')@endsection
@section('content')
    <div class="container-xl">
        <div class="h4 mb-3 mb-sm-4">
            @lang('app.dashboard')
        </div>
        <div class="row g-3 g-sm-4 mb-3 mb-sm-4">
            @foreach($objs as $obj)
                <div class="col">
                    <div class="border rounded p-2 p-sm-3 h-100">
                        <div class="h5 mb-0">{{ $obj['name'] }}</div>
                        <div class="fs-3 text-primary text-end">{{ $obj['count'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row g-3 g-sm-4">
            @foreach($viewByDays as $viewByDay)
                <div class="col">
                    <div class="border rounded p-2 p-sm-3 h-100">
                        <div class="small">{{ \Carbon\Carbon::parse($viewByDay->day)->format('d.m.Y') }}</div>
                        <div class="fs-5 text-danger text-end">{{ $viewByDay->count }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection