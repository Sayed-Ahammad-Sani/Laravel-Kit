@extends('layouts.back_end.app')
@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<style>
    /* DataTables style */
    .dataTables_wrapper .dataTables_length {
        padding-top: 1rem;
        padding-left: 1rem;
    }

    .dataTables_wrapper .dataTables_filter {
        padding-top: 1rem;
        padding-right: 1em;
    }

    .dataTables_wrapper .dataTables_info {
        padding-left: 1rem;
        padding-bottom: 1em;
    }

    .dataTables_wrapper .dataTables_paginate {
        padding-right: 1em;
    }
</style>
@endpush
@section('dashboard-inner-content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa-solid fa-server icon-gradient bg-mean-fruit"> </i>
            </div>
            <div>
                Roles
            </div>
        </div>
        <div class="page-title-actions">
            <a href="{{route('app.roles.create')}}" title="Create New Role For User"
                class="btn-shadow me-3 btn btn-primary">
                <i class="fa-solid fa-circle-plus"></i>
                Create Roles
            </a>
        </div>
    </div>
</div>
<x-sessionMessage></x-sessionMessage>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="table-responsive">
                <table id="dataTable" class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">SL No.</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Permissions</th>
                            <th class="text-center">Updated At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key => $role)
                        <tr>
                            <td class="text-center text-muted">{{$key+1}}</td>
                            <td class="text-center">{{$role->name}}</td>
                            <td class="text-center">
                                @if($role->permissions->count() > 0)
                                <span class="badge bg-info">{{$role->permissions->count()}}</span>
                                @else
                                <span class="badge bg-warning">No Permission Found!</span>
                                @endif
                            </td>
                            <td class="text-center">{{$role->updated_at->diffForHumans()}}</td>
                            <td class="text-center">
                                <a href="{{route('app.roles.edit',$role->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    Edit
                                </a>
                                @if ($role->deletable == true)
                                <form action="{{route('app.roles.destroy',$role->id)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this item')">
                                        <i class="fa-solid fa-trash"></i>
                                        Delete
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#dataTable').DataTable();
    });
</script>
@endpush