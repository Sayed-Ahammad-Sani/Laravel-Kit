@extends('layouts.back_end.app')
@push('style')
<link rel="stylesheet" href="{{asset('css/datatable/dataTables.tailwindcss.css')}}">
@endpush
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

        <!-- ====== Table Section Start -->
        <div class="flex flex-col gap-10">
            <!-- ====== Table Three Start -->
            <div
                class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">

                <x-session-message></x-session-message>

                <div class="text-right mb-2">
                    <a href="{{route('app.users.create')}}"
                        class="inline-flex items-center justify-center gap-1.5 rounded-full bg-black px-5 py-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 48 48"
                                viewBox="0 0 48 48" class="fill-current" width="20" height="20" viewBox="0 0 32 32"
                                fill="none">
                                <path d="M24,2C11.87,2,2,11.87,2,24s9.87,22,22,22s22-9.87,22-22S36.13,2,24,2z M24,42c-9.93,0-18-8.07-18-18S14.07,6,24,6
                                  c9.92,0,18,8.07,18,18S33.92,42,24,42z"></path>
                                <path d="M26,22V12c0-1.1-0.9-2-2-2s-2,0.9-2,2v10H12c-1.1,0-2,0.9-2,2s0.9,2,2,2h10v10c0,1.1,0.9,2,2,2s2-0.9,2-2V26h10
                                  c1.1,0,2-0.9,2-2s-0.9-2-2-2H26z"></path>
                            </svg>
                        </span>
                        Add
                    </a>
                </div>
                <div class="max-w-full overflow-x-auto">
                    <table id="dataTable" class="w-full table-auto display">
                        <thead>
                            <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                <th class="px-4 py-4 font-medium text-black dark:text-white">SL
                                    No.</th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">Photo</th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">Name</th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">Email
                                </th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">Status</th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">Added Date</th>
                                <th class="px-4 py-4 font-medium text-black dark:text-white">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr class="hover:bg-gray-900/5 dark:hover:bg-gray-900/50">
                                <td
                                    class="border-b border-[#eee] px-4 py-5 dark:border-strokedark text-black dark:text-white">
                                    {{$key+1}}</td>
                                <td
                                    class="border-b border-[#eee] px-4 py-5 dark:border-strokedark text-black dark:text-white">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full"
                                                src="{{ $user->getFirstMediaUrl('photo') ? $user->getFirstMediaUrl('photo') : $user->profile_photo_url }}"
                                                alt="{{ $user->name }} Profile Photo">
                                        </div>
                                    </div>

                                <td
                                    class="border-b border-[#eee] px-4 py-5 dark:border-strokedark text-black dark:text-white">
                                    <div>
                                        <span class="px-3 py-1">
                                            {{ $user->name }}
                                        </span>
                                    </div>
                                    <div>
                                        @if ($user->role)
                                        <span
                                            class="inline-flex rounded-full bg-success bg-opacity-10 px-3 py-1 text-sm font-medium text-success">{{$user->role->name}}</span>
                                        @else
                                        <span
                                            class="inline-flex rounded-full bg-warning bg-opacity-10 px-3 py-1 text-sm font-medium text-warning">No
                                            Role Found!</span>
                                        @endif
                                    </div>
                                </td>
                                <td
                                    class="border-b border-[#eee] px-4 py-5 dark:border-strokedark text-black dark:text-white">
                                    {{$user->email}}
                                </td>
                                <td
                                    class="border-b border-[#eee] px-4 py-5 dark:border-strokedark text-black dark:text-white">
                                    @if ($user->status == true)
                                    <span
                                        class="inline-flex rounded-full bg-success bg-opacity-10 px-3 py-1 text-sm font-medium text-success">Active</span>
                                    @else
                                    <span
                                        class="inline-flex rounded-full bg-warning bg-opacity-10 px-3 py-1 text-sm font-medium text-warning">Inactive</span>
                                    @endif
                                </td>
                                <td
                                    class="border-b border-[#eee] px-4 py-5 dark:border-strokedark text-black dark:text-white">
                                    {{$user->created_at->diffForHumans()}}
                                </td>
                                <td
                                    class="border-b border-[#eee] px-4 py-5 dark:border-strokedark text-black dark:text-white">
                                    <div class="flex items-center gap-4">
                                        <a href="{{route('app.users.show',$user->id)}}"
                                            class="inline-flex items-center justify-center gap-1.5 rounded-full bg-black px-5 py-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
                                            <span>
                                                <svg class="fill-current" width="20" height="20"
                                                    enable-background="new 0 0 32 32" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12 5C7.064 5 3.308 8.058 1 12c2.308 3.942 6.064 7 11 7s8.693-3.058 11-7c-2.307-3.942-6.065-7-11-7zm0 12c-4.31 0-7.009-2.713-8.624-5C4.991 9.713 7.69 7 12 7c4.311 0 7.01 2.713 8.624 5-1.614 2.287-4.313 5-8.624 5z">
                                                    </path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </span>
                                            Show
                                        </a>
                                        <a href="{{route('app.users.edit',$user->id)}}"
                                            class="inline-flex items-center justify-center gap-1.5 rounded-full bg-black px-5 py-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
                                            <span>
                                                <svg class="fill-current" width="20" height="20"
                                                    enable-background="new 0 0 32 32" viewBox="0 0 32 32" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.82373,12.95898l-1.86279,6.21191c-0.1582,0.52832-0.01367,1.10156,0.37646,1.49121c0.28516,0.28516,0.66846,0.43945,1.06055,0.43945c0.14404,0,0.28906-0.02051,0.43066-0.06348l6.2124-1.8623c0.23779-0.07129,0.45459-0.2002,0.62988-0.37598L31.06055,7.41016C31.3418,7.12891,31.5,6.74707,31.5,6.34961s-0.1582-0.7793-0.43945-1.06055l-4.3501-4.34961c-0.58594-0.58594-1.53516-0.58594-2.12109,0L13.2002,12.3291C13.02441,12.50488,12.89551,12.7207,12.82373,12.95898z M15.58887,14.18262L25.6499,4.12109l2.22852,2.22852L17.81738,16.41113l-3.18262,0.9541L15.58887,14.18262z">
                                                    </path>
                                                    <path
                                                        d="M30,14.5c-0.82861,0-1.5,0.67188-1.5,1.5v10c0,1.37891-1.12158,2.5-2.5,2.5H6c-1.37842,0-2.5-1.12109-2.5-2.5V6c0-1.37891,1.12158-2.5,2.5-2.5h10c0.82861,0,1.5-0.67188,1.5-1.5S16.82861,0.5,16,0.5H6C2.96729,0.5,0.5,2.96777,0.5,6v20c0,3.03223,2.46729,5.5,5.5,5.5h20c3.03271,0,5.5-2.46777,5.5-5.5V16C31.5,15.17188,30.82861,14.5,30,14.5z">
                                                    </path>
                                                </svg>
                                            </span>
                                            Edit
                                        </a>
                                        <form action="{{route('app.users.destroy',$user->id)}}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                onclick="return confirm('Are you sure you want to delete this item')"
                                                class="inline-flex items-center justify-center gap-1.5 rounded-full px-5 py-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5"
                                                style="background-color: red">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        enable-background="new 0 0 48 48" class="fill-current"
                                                        viewBox="0 0 100 100">
                                                        <path
                                                            d="m78.4 30.4-3.1 57.8c-.1 2.1-1.9 3.8-4 3.8H20.7c-2.1 0-3.9-1.7-4-3.8l-3.1-57.8c-.1-2.2 1.6-4.1 3.8-4.2 2.2-.1 4.1 1.6 4.2 3.8l2.9 54h43.1l2.9-54c.1-2.2 2-3.9 4.2-3.8 2.1.1 3.8 2 3.7 4.2zM89 17c0 2.2-1.8 4-4 4H7c-2.2 0-4-1.8-4-4s1.8-4 4-4h22V4c0-1.9 1.3-3 3.2-3h27.6C61.7 1 63 2.1 63 4v9h22c2.2 0 4 1.8 4 4zm-53-4h20V8H36v5zm1.7 65c2 0 3.5-1.9 3.5-3.8l-1-43.2c0-1.9-1.6-3.5-3.6-3.5-1.9 0-3.5 1.6-3.4 3.6l1 43.3c0 1.9 1.6 3.6 3.5 3.6zm16.5 0c1.9 0 3.5-1.6 3.5-3.5l1-43.2c0-1.9-1.5-3.6-3.4-3.6-2 0-3.5 1.5-3.6 3.4l-1 43.2c-.1 2 1.5 3.7 3.5 3.7-.1 0-.1 0 0 0z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ====== Table Three End -->
        </div>
        <!-- ====== Table Section End -->
    </div>
</main>
<!-- ===== Main Content End ===== -->
@endsection
@push('script')
<script src="{{asset('js/datatable/jquery-3.7.1.js')}}"></script>
<script src="{{asset('js/datatable/tailwindcss.js')}}"></script>
<script src="{{asset('js/datatable/dataTables.js')}}"></script>
<script src="{{asset('js/datatable/dataTables.tailwindcss.js')}}"></script>
<script>
    new DataTable('#dataTable');
    document.querySelectorAll('tr').forEach(row => {
        row.classList.remove('even:bg-gray-50', 'dark:even:bg-gray-900/50');
    });


    // Start Alert close js code
    document.addEventListener("DOMContentLoaded", function () {
    const alertBox = document.getElementById("alertBox");
    const closeAlert = document.getElementById("closeAlert");
    
    // Close alert when the "X" button is clicked
    closeAlert.addEventListener("click", function () {
    alertBox.style.display = "none";
    });
    
    // Auto-hide the alert after 5 seconds
    setTimeout(function () {
    alertBox.style.display = "none";
    }, 10000); // 10000ms = 10 seconds
    });
    // End Alert close js code

</script>
@endpush




{{-- @push('style')
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
<x-session-message></x-session-message>
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
@endpush --}}