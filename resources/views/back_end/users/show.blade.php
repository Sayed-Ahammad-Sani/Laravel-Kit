@extends('layouts.back_end.app')
@section('dashboard-inner-content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa-solid fa-user icon-gradient bg-mean-fruit"> </i>
            </div>
            <div>
                User Profile
            </div>
        </div>
        <div class="page-title-actions">
            <a href="{{route('app.users.index')}}" title="Back To List" class="btn-shadow me-3 btn btn-danger">
                <i class="fa-solid fa-delete-left"></i>
                Back To List
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <img src="{{$user->getFirstMediaUrl('photo')!= null ? $user->getFirstMediaUrl('photo') : $user->profile_photo_url}}"
                    alt="{{$user->name . '_profile'}}" class="img-fluid img-thumbnail" width="300">
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="main-card mb-3 card">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <tbody>
                        <tr>
                            <th scope="row">Name:</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email:</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Role:</th>
                            <td>
                                @if ($user->role)
                                <span class="badge bg-info">{{$user->role->name}}</span>
                                @else
                                <span class="badge bg-danger">No Role Found!</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Status:</th>
                            <td>
                                @if ($user->status == true)
                                <span class="badge bg-info">Active</span>
                                @else
                                <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Added Date:</th>
                            <td>
                                @php
                                $date = new DateTime($user->created_at);
                                $date->setTimezone(new DateTimeZone('+6'));
                                echo $date->format('d-m-Y h:i:s A');
                                @endphp
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Last Modify:</th>
                            <td>
                                @php
                                $date = new DateTime($user->updated_at);
                                $date->setTimezone(new DateTimeZone('+6'));
                                echo $date->format('d-m-Y h:i:s A');
                                @endphp
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection