@extends('layouts.back_end.app')

@section('dashboard-inner-content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa-solid fa-server icon-gradient bg-mean-fruit"> </i>
            </div>
            <div>
                Create Roles
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
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{$role->name ?? old('name')}}" required autofocus>

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
                    <div class="form-group my-2">
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
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
@endpush