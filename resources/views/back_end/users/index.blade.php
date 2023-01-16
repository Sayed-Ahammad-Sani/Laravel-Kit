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
                <i class="fa-solid fa-users icon-gradient bg-mean-fruit"> </i>
            </div>
            <div>
                Users
            </div>
        </div>
        <div class="page-title-actions">
            <a href="{{route('app.users.create')}}" title="Create New Role For User"
                class="btn-shadow me-3 btn btn-primary">
                <i class="fa-solid fa-circle-plus"></i>
                Create Users
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
                            <th>Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Added Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td class="text-center text-muted">{{$key+1}}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left me-3">
                                            <div class="widget-content-left">
                                                <img width="40" height="40" class="rounded-circle"
                                                    src="{{$user->getFirstMediaUrl('photo')!= null ? $user->getFirstMediaUrl('photo') : $user->profile_photo_url}}"
                                                    alt="{{$user->name}} Prifile Photo">
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $user->name }}</div>
                                            <div class="widget-subheading opacity-7">
                                                @if ($user->role)
                                                <span class="badge bg-info">{{$user->role->name}}</span>
                                                @else
                                                <span class="badge bg-danger">No Role Found!</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{$user->email}}</td>
                            <td class="text-center">
                                @if ($user->status == true)
                                <span class="badge bg-info">Active</span>
                                @else
                                <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center">{{$user->created_at->diffForHumans()}}</td>
                            <td class="text-center">
                                <a href="{{route('app.users.show',$user->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fa-regular fa-eye"></i>
                                    Show
                                </a>
                                <a href="{{route('app.users.edit',$user->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    Edit
                                </a>
                                <form action="{{route('app.users.destroy',$user->id)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this item')">
                                        <i class="fa-solid fa-trash"></i>
                                        Delete
                                    </button>
                                </form>
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
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#dataTable').DataTable();
    });
</script>
@endpush