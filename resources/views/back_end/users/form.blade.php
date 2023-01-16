@extends('layouts.back_end.app')
@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
@endpush
@section('dashboard-inner-content')
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
@endsection

@push('script')
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('js/dropify.js')}}"></script>
<script>
    document.getElementById("name").focus();
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('.dropify').dropify();
    });
</script>
@endpush