@extends('layouts.back_end.app')
@section('body')
<!-- ===== Main Content Start ===== -->
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Users
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="{{route('app.dashboard')}}">Home /</a>
                    </li>
                    <li class="font-medium text-primary">Users</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->


        <div class="grid grid-cols-12 gap-9 bg-white dark:border-strokedark dark:bg-boxdark rounded-lg shadow-md">
            <div class="col-span-3 flex flex-col gap-9">
                <!-- Profile Image Section -->
                <div class="p-4">
                    <img src="{{$user->getFirstMediaUrl('photo') != null ? $user->getFirstMediaUrl('photo') : $user->profile_photo_url}}"
                        alt="{{$user->name . '_profile'}}" class="rounded-lg w-full object-cover">
                </div>
            </div>
            <div class="col-span-9 flex flex-col gap-9">
                <!-- User Details Section -->
                <div class="overflow-hidden">
                    <table class="table-auto w-full text-sm">
                        <tbody>
                            <!-- Name -->
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th class="px-4 py-2 text-left font-medium text-gray-600 dark:text-white">
                                    Name:
                                </th>
                                <td class="px-4 py-2 text-gray-800 dark:text-white">{{$user->name}}</td>
                            </tr>
                            <!-- Email -->
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th class="px-4 py-2 text-left font-medium text-gray-600 dark:text-white">
                                    Email:
                                </th>
                                <td class="px-4 py-2 text-gray-800 dark:text-white">{{$user->email}}</td>
                            </tr>
                            <!-- Role -->
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th class="px-4 py-2 text-left font-medium text-gray-600 dark:text-white">
                                    Role:
                                </th>
                                <td class="px-4 py-2">
                                    @if ($user->role)
                                    <span
                                        class="px-2 py-1 text-xs font-semibold inline-flex rounded-full bg-success bg-opacity-10 px-3 py-1 text-sm font-medium text-success">{{$user->role->name}}</span>
                                    @else
                                    <span
                                        class="px-2 py-1 text-xs font-semibold inline-flex rounded-full bg-warning bg-opacity-10 px-3 py-1 text-sm font-medium text-warning">No
                                        Role Found!</span>
                                    @endif
                                </td>
                            </tr>
                            <!-- Status -->
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th class="px-4 py-2 text-left font-medium text-gray-600 dark:text-white">
                                    Status:
                                </th>
                                <td class="px-4 py-2">
                                    @if ($user->status == true)
                                    <span
                                        class="px-2 py-1 text-xs font-semibold inline-flex rounded-full bg-success bg-opacity-10 px-3 py-1 text-sm font-medium text-success">Active</span>
                                    @else
                                    <span
                                        class="px-2 py-1 text-xs font-semibold inline-flex rounded-full bg-warning bg-opacity-10 px-3 py-1 text-sm font-medium text-warning">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                            <!-- Added Date -->
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th class="px-4 py-2 text-left font-medium text-gray-600 dark:text-white">
                                    Added
                                    Date:</th>
                                <td class="px-4 py-2 text-gray-800 dark:text-white">
                                    @php
                                    $date = new DateTime($user->created_at);
                                    $date->setTimezone(new DateTimeZone('+6'));
                                    echo $date->format('d-m-Y h:i:s A');
                                    @endphp
                                </td>
                            </tr>
                            <!-- Last Modify -->
                            <tr>
                                <th class="px-4 py-2 text-left font-medium text-gray-600 dark:text-white">
                                    Last
                                    Modify:</th>
                                <td class="px-4 py-2 text-gray-800 dark:text-white">
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
</main>
<!-- ===== Main Content End ===== -->
@endsection





{{-- @section('dashboard-inner-content')
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
@endsection --}}