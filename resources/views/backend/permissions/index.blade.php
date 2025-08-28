@extends('layouts.backend.app')
@section('title')
    Permissions
@endsection
@section('css')
    <link href="{{ asset('backend') }}/assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Permissions</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Permissions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @include('components.alert')
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Permissions</h4>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('admin.permission.create') }}" class="btn bt btn-primary">
                                    <i class="icofont-plus-circle fs-5 me-1"></i> Buat Baru
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Permission Name</th>
                                        <th class="text-center">Permission Guard</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($permissions as $key => $permission)
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td class="text-center">{{ $permission->name }}</td>
                                            <td class="text-center">{{ $permission->guard_name }}</td>
                                            <td class="text-center">
                                                <div class="flex-wrap gap-2">
                                                    <a href="#" class="btn btn-success"><i class="fas fa-eye"></i> View</a>
                                                    @can('permission-edit')
                                                    <a href="{{ route('admin.permission.edit',['id' => $permission->id]) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    @endcan
                                                    @can('permission-delete')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.permission.destroy', $permission->id], 'style' => 'display:inline']) !!}
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                                    {!! Form::close() !!}
                                                    @endcan
                                                </div>
                                            </td>
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
