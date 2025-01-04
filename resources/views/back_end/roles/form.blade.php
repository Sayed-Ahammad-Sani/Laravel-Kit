@extends('layouts.back_end.app')
@section('body')
<!-- ===== Main Content Start ===== -->
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                {{isset($role)?'Edit':'Create'}} Roles
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="{{route('app.dashboard')}}">Home /</a>
                    </li>
                    <li class="font-medium text-primary">Add Roles</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <!-- ====== Form Layout Section Start -->
        <div class="grid grid-cols-1 gap-9 sm:grid-cols-1">
            <div class="flex flex-col gap-9">
                <!-- Roles Management Form -->
                <div
                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">Manage Roles</h3>
                    </div>
                    <form action="{{ isset($role) ? route('app.roles.update', $role->id) : route('app.roles.store') }}"
                        method="post">
                        @csrf
                        @isset($role)
                        @method('PUT')
                        @endisset
                        <div class="p-6.5">
                            <!-- Role Name Input -->
                            <div class="mb-4.5">
                                <label for="name" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Role Name
                                </label>
                                <input type="text" id="name" name="name" value="{{ $role->name ?? old('name') }}"
                                    required
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                                @error('name')
                                <span class="text-danger text-sm"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Permissions Section -->
                            <div class="text-center my-4">
                                <strong class="block text-sm font-medium text-black dark:text-white">
                                    Manage permissions for role
                                </strong>
                                @error('permissions')
                                <span class="text-danger text-sm block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Select All Checkbox -->
                            <div class="mb-4">
                                <div class="flex items-center">
                                    <input type="checkbox" id="select-all"
                                        class="h-4 w-4 border-gray-300 rounded text-primary focus:ring-primary"
                                        onclick="toggleSelectAll(this)" />
                                    <label for="select-all" class="ml-4 text-sm font-medium text-black dark:text-white">
                                        Select All
                                    </label>
                                </div>
                            </div>

                            <!-- Modules and Permissions -->
                            @forelse ($modules->chunk(2) as $chunks)
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 mb-4.5">
                                @foreach ($chunks as $module)
                                <div class="p-4 border border-gray-300 rounded-md shadow-sm bg-white">
                                    <h5 class="mb-4 text-lg font-semibold text-gray-700">Module: {{ $module->name }}
                                    </h5>
                                    <div class="space-y-3">
                                        @foreach ($module->permissions as $permission)
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" id="permission-{{ $permission->id }}"
                                                name="permissions[]" value="{{ $permission->id }}"
                                                class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary"
                                                @if (isset($role) && $role->permissions->contains('id',
                                            $permission->id))
                                            checked
                                            @endif
                                            />
                                            <label for="permission-{{ $permission->id }}"
                                                class="ml-4 text-sm text-gray-600">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @empty
                            <div class="text-center py-6">
                                <strong class="text-gray-500">No Module Found.</strong>
                            </div>
                            @endforelse

                            <!-- Submit Button -->
                            <button
                                class="mt-6 w-full rounded bg-primary px-5 py-3 text-center font-medium text-white hover:bg-opacity-90">
                                <i class="fa-solid fa-file-import mr-2"></i> Save
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- ====== Form Layout Section End -->

    </div>
</main>
<!-- ===== Main Content End ===== -->
@endsection
@push('script')
<script>
    function toggleSelectAll(selectAllCheckbox) {
        const checkboxes = document.querySelectorAll('input[name="permissions[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    }
</script>
@endpush





















{{-- @section('dashboard-inner-content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa-solid fa-fingerprint icon-gradient bg-mean-fruit"> </i>
            </div>
            <div>{{isset($role)?'Edit':'Create'}} Role</div>
        </div>
        <div class="page-title-actions">
            <a href="{{route('app.roles.index')}}" title="Back To List" class="btn-shadow me-3 btn btn-danger">
                <i class="fa-solid fa-delete-left"></i>
                Back To List
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <form action="{{isset($role) ? route('app.roles.update',$role->id) : route('app.roles.store')}}"
                method="post">
                @csrf
                @isset($role)
                @method('PUT')
                @endisset
                <div class="card-body">
                    <h5 class="card-title">Manage Roles</h5>
                    <div class="mb-3">
                        <label for="name">Role Name</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{$role->name ?? old('name')}}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alart">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="text-center my-2">
                        <strong>Manage permissions for role</strong>
                        @error('permission')
                        <span class="text-danger d-block" role="alart">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 my-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="select-all">
                            <label for="select-all" class="custom-control-label">Select All</label>
                        </div>
                    </div>
                    @forelse ($modules->chunk(2) as $key=>$chunks)
                    <div class="row">
                        @foreach ($chunks as $key=>$module)
                        <div class="col">
                            <h5>Module: {{$module->name}}</h5>
                            @foreach ($module->permissions as $key=>$permission)
                            <div class="mb-3 ml-4">
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input"
                                        id="permission-{{$permission->id}}" name="permissions[]"
                                        value="{{$permission->id}}" @isset($role) @foreach ($role->permissions as
                                    $rPermission)
                                    {{$permission->id == $rPermission->id ? 'checked':''}}
                                    @endforeach
                                    @endisset>
                                    <label for="permission-{{$permission->id}}"
                                        class="custom-control-label">{{$permission->name}}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>

                    @empty
                    <div class="row">
                        <div class="col text-center">
                            <strong>No Module Found.</strong>
                        </div>
                    </div>
                    @endforelse
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-file-import me-2"></i>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script>
    document.getElementById("name").focus();
    // Listen for click on toggle checkbox
    $('#select-all').click(function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function () {
            this.checked = false;
            });
        }
    })
</script>
@endpush --}}