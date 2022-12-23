@extends('layouts.back_end.app')
@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
            <button type="button" data-bs-toggle="tooltip" title="Example Tooltip" data-bs-placement="bottom"
                class="btn-shadow me-3 btn btn-dark">
                <i class="fa fa-star"></i>
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                Active Users
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <button class="active btn btn-focus">Last Week</button>
                        <button class="btn btn-focus">All Month</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
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
                                <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>  
                                Delete
                                </button>
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