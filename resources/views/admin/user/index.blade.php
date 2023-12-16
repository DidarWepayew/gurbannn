@extends('admin.layouts.app')
@section('title')@lang('app.users')@endsection
@section('content')
    <div class="container-xl">
        <div class="h4 mb-3 mb-sm-4">
            @lang('app.users')
        </div>
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>@lang('app.name')</th>
                <th>@lang('app.username')</th>
                <th>@lang('app.isAdmin')</th>
                <th>@lang('app.lastSeen')</th>
                <th>@lang('app.createdAt')</th>
                <th><i class="bi-gear-fill"></i></th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->name }}</td>
                    <td>{{ $obj->username }}</td>
                    <td>{!! $obj->is_admin ? '<i class="bi-check-circle-fill text-success"></i>' : '' !!}</td>
                    <td>{{ $obj->last_seen ? $obj->last_seen->format('d.m.Y H:i:s') : '' }}</td>
                    <td>{{ $obj->created_at->format('d.m.Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $obj->id) }}" class="btn btn-success btn-sm">
                            <i class="bi-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection