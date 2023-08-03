@section('css')
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
@endsection
@extends('master')
@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">Add User</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('manageuser.index')}}">User</a></li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card comman-shadow">
                <div class="card-body">
                    <form action="{{ route('manageuser.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title student-info">User Information <span>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Name <span class="login-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        type="text" 
                                        placeholder="Enter Name"
                                        name="name"
                                        id="name"
                                        maxlength="20"
                                        required
                                        value="{{old('name')}}"
                                        >
                                    @error('name') <font color="red"> {{ $message }} </font> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Email <span class="login-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        type="email" 
                                        placeholder="Enter Email"
                                        name="email"
                                        id="email"
                                        maxlength="20"
                                        required
                                        value="{{old('email')}}"
                                        >
                                    @error('email') <font color="red"> {{ $message }} </font> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        type="password" 
                                        placeholder="Enter Password"
                                        name="password"
                                        id="password"
                                        maxlength="20"
                                        required
                                        value="{{old('password')}}"
                                        >
                                    <span id="togglePassword" class="profile-views feather-eye toggle-password"></span>
                                    @error('password') <font color="red"> {{ $message }} </font> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Role</label>
                                    <select class="form-control select" name="role">
                                        <option>Select Option</option>
                                        @foreach ($roles as $role )
                                            <option value="{{$role->id}}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    //addEventListener
    togglePassword.addEventListener('click',function(e){
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

    });
</script>
@endsection