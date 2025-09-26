@extends('layouts.backend.app')
@section('title','Visitors')
@section('css')
    <link href="{{ asset('backend') }}/assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Visitors</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Visitors</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Visitors</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Method</th>
                                        <th class="text-center">Url</th>
                                        <th class="text-center">Referer</th>
                                        <th class="text-center">Technology</th>
                                        <th class="text-center">User</th>
                                        <th class="text-center">User Agent</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($visitors as $visitor)
                                        <tr>
                                            <td class="text-center">
                                                @switch($visitor->method)
                                                    @case('GET')
                                                        <span class="text-success">{{ $visitor->method }}</span>
                                                        @break
                                                    @case('POST')
                                                        <span class="text-info">{{ $visitor->method }}</span>
                                                    @case('DELETE')
                                                        <span class="text-danger">{{ $visitor->method }}</span>
                                                        @break
                                                    @default

                                                @endswitch
                                            </td>
                                            <td>{{ $visitor->url }}</td>
                                            <td>{{ $visitor->referer }}</td>
                                            <td>
                                                <ul>
                                                    <li>Device : {{ $visitor->device }}</li>
                                                    <li>Browser : {{ $visitor->browser }}</li>
                                                    <li>IP : {{ $visitor->ip }}</li>
                                                </ul>
                                            </td>
                                            <td class="text-center">{{ empty($visitor->user) ? '-' : $visitor->user->name }}</td>
                                            <td>{{ $visitor->useragent }}</td>
                                            <td>{{ $visitor->created_at }}</td>
                                            <td>{{ $visitor->updated_at }}</td>
                                        </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('backend') }}/assets/libs/simple-datatables/umd/simple-datatables.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/datatable.init.js"></script>
@endsection
