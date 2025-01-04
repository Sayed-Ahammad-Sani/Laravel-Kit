@extends('layouts.back_end.app')
@push('style')
{{--
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
{{--
<link rel="stylesheet" href="{{asset('css/dropify.css')}}"> --}}
@endpush
@section('body')

<!-- ===== Main Content Start ===== -->
<main>
    <!-- ====== Form Layout Section Start -->
    <form action="{{ isset($user) ? route('app.users.update', $user->id) : route('app.users.store') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @isset($user)
        @method('PUT')
        @endisset
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                    {{isset($user)?'Edit':'Create'}} User
                </h2>

                <nav>
                    <ol class="flex items-center gap-2">
                        <li>
                            <a class="font-medium" href="{{route('app.dashboard')}}">Home /</a>
                        </li>
                        <li class="font-medium text-primary">Add User</li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb End -->
            <div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
                <div class="flex flex-col gap-9">
                    <!-- User Management Form -->
                    <div
                        class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                        <div class="p-6.5">
                            <!-- User Name Input -->
                            <div class="mb-4.5">
                                <label for="name" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    User Name
                                </label>
                                <input type="text" id="name" name="name" name="name"
                                    value="{{$user->name ?? old('name')}}" required
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                                @error('name')
                                <span class="text-danger text-sm"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- User Email Input -->
                            <div class="mb-4.5">
                                <label for="email" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    User Email
                                </label>
                                <input type="text" id="email" name="email" name="email"
                                    value="{{$user->email ?? old('email')}}" required
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                                @error('email')
                                <span class="text-danger text-sm"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- User Password Input-->
                            <div class="mb-4.5">
                                <label for="password" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Password
                                </label>
                                <input type="password" id="password" name="password" name="password"
                                    value="{{old('password')}}" required
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                                @error('password')
                                <span class="text-danger text-sm"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- User Confirm Password Input-->
                            <div class="mb-4.5">
                                <label for="confirm_password"
                                    class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Confirm Password
                                </label>
                                <input type="password" id="confirm_password" name="password_confirmation"
                                    name="password" value="{{old('password')}}" required
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                                @error('password')
                                <span class="text-danger text-sm"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="flex flex-col gap-9">
                    <!-- User Management Form -->
                    <div
                        class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                        <div class="p-6.5">
                            <!-- User Role Input -->
                            <div class="mb-4.5">
                                <label for="Role" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    User Role
                                </label>
                                <div class="relative z-20 bg-white dark:bg-form-input">
                                    <select
                                        class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input js-example-basic-single"
                                        id="role" name="role" required>
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}" @isset($user) {{$user->role->id == $role->id ?
                                            'selected':''}} @endisset>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="absolute right-4 top-1/2 z-10 -translate-y-1/2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.8">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                    fill="#637381"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                @error('role')
                                <span class="text-danger text-sm"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- User Photo Input -->
                            <div class="mb-4.5">
                                <label for="photo" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    User Photo
                                </label>
                                <input id="photo" name="photo" type="file"
                                    class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary">
                                @error('photo')
                                <span class="text-danger text-sm"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- User Status Input -->
                            <div class="mb-4.5">
                                <label for="status" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    User Status
                                </label>
                                <div
                                    x-data="{ switcherToggle: @php $status = isset($user) && $user->status ? 'true' : 'false'; @endphp {{ $status }} }">
                                    <label for="toggle3" class="flex cursor-pointer select-none items-center">
                                        <div class="relative">
                                            <input type="checkbox" id="toggle3" class="sr-only" name="status"
                                                @change="switcherToggle = !switcherToggle" :checked="switcherToggle" />
                                            <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
                                            <div :class="switcherToggle && '!right-1 !translate-x-full !bg-primary dark:!bg-white'"
                                                class="dot absolute left-1 top-1 flex h-6 w-6 items-center justify-center rounded-full bg-white transition">
                                                <span :class="switcherToggle && '!block'"
                                                    class="hidden text-white dark:text-bodydark">
                                                    <!-- Checked Icon -->
                                                    <svg class="fill-current stroke-current" width="11" height="8"
                                                        viewBox="0 0 11 8" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z"
                                                            fill="" stroke="" stroke-width="0.4"></path>
                                                    </svg>
                                                </span>
                                                <span :class="switcherToggle && 'hidden'">
                                                    <!-- Unchecked Icon -->
                                                    <svg class="h-4 w-4 stroke-current" fill="none" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                @error('status')
                                <span class="text-danger text-sm"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Submit Button -->
            <button
                class="mt-6 w-full rounded bg-primary px-5 py-3 text-center font-medium text-white hover:bg-opacity-90">
                <i class="fa-solid fa-file-import mr-2"></i> Save
            </button>
        </div>
    </form>
    <!-- ====== Form Layout Section End -->
</main>
<!-- ===== Main Content End ===== -->




@endsection
@push('script')
{{-- <script src="{{asset('js/jquery-3.5.1.js')}}"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
{{-- <script src="{{asset('js/dropify.js')}}"></script> --}}
<script>
    document.getElementById("name").focus();
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        // $('.js-example-basic-single').select2();
        // $('.dropify').dropify();
    });
</script>
@endpush







{{-- @section('dashboard-inner-content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa-solid fa-users icon-gradient bg-mean-fruit"> </i>
            </div>
            <div>{{isset($user)?'Edit':'Create'}} User</div>
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
    <div class="col-md-12">
        <form action="{{isset($user) ? route('app.users.update',$user->id) : route('app.users.store')}}" method="post"
            enctype="multipart/form-data">
            @csrf
            @isset($user)
            @method('PUT')
            @endisset
            <div class="row">
                <div class="col-md-8">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">User Info</h5>
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{$user->name ?? old('name')}}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alart">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{$user->email ?? old('email')}}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alart">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    {{!isset($user) ? 'required' : '' }}>
                                @error('password')
                                <span class="invalid-feedback" role="alart">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password_confirmation" {{!isset($user) ? 'required' : '' }}>
                                @error('password')
                                <span class="invalid-feedback" role="alart">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Select Role And Status</h5>
                            <div class="mb-3">
                                <label for="role">Select Role</label>
                                <select id="role"
                                    class="js-example-basic-single form-select @error('role') is-invalid @enderror"
                                    name="role" required>
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}" @isset($user) {{$user->role->id == $role->id ?
                                        'selected':''}} @endisset>{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alart">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="photo">Select Profile Photo</label>
                                <input type="file" id="photo"
                                    class="form-control dropify @error('photo') is-invalid @enderror" name="photo"
                                    data-default-file="{{ isset($user) ? $user->getFirstMediaUrl('photo') : ''}}">
                                @error('photo')
                                <span class="text-danger" role="alart">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="status" name="status"
                                        @isset($user) {{$user->status == true ? 'checked' : ''}} @endisset>
                                    <label class="form-check-label" for="status">Status</label>
                                </div>
                                @error('status')
                                <span class="text-danger" role="alart">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary float-end">
                                <i class="fa-solid fa-file-import me-2"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection --}}