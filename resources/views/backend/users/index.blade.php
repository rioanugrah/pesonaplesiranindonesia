@extends('layouts.backend.app')
@section('title')
    Users
@endsection
@section('css')
    <link href="{{ asset('backend') }}/assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Users</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Users</li>
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
                                <h4 class="card-title">Users</h4>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('admin.users.create') }}" class="btn bt btn-primary">
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
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Roles</th>
                                        <th class="text-center">Last Seen</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td class="text-center">{{ $user->username }}</td>
                                            <td class="text-center">{{ $user->name }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center">
                                                @foreach ($user->getRoleNames() as $v)
                                                    @switch($v)
                                                        @case('Administrator')
                                                            <span class="badge bg-primary">{{ $v }}</span>
                                                        @break

                                                        @case('Partnership')
                                                            <span class="badge bg-info">{{ $v }}</span>
                                                        @break

                                                        @case('Users')
                                                            <span class="badge bg-success">{{ $v }}</span>
                                                        @break

                                                        @default
                                                    @endswitch
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                {{ empty($user->last_seen) ? '-' : \Carbon\Carbon::create($user->last_seen)->isoFormat('LLLL') }}
                                            </td>
                                            <td class="text-center">
                                                @if (Cache::has('user-is-online-' . $user->id))
                                                    <span class="text-success">Online</span>
                                                @else
                                                    <span class="text-secondary">Offline</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="flex-wrap gap-2">
                                                    <a href="#" class="btn btn-success"><i class="fas fa-eye"></i>
                                                        View</a>
                                                    @can('user-edit')
                                                        <a href="{{ route('admin.users.edit', ['generate' => $user->generate]) }}"
                                                            class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @can('user-delete')
                                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i>
                                                            Delete</a>
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
