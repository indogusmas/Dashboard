@extends('master')
@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">Add Role</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('managerole.index')}}">Role</a></li>
                        <li class="breadcrumb-item active">Add Role</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card comman-shadow">
                <div class="card-body">
                    <form action="{{ route('managerole.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="form-title student-info">Role Information <span>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group local-forms">
                                    <label>Role <span class="login-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        type="text" 
                                        name="name"
                                        id="role"
                                        maxlength="20"
                                        required
                                        value="{{old('role')}}"
                                        >
                                    @error('role') <font color="red"> {{ $message }} </font> @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Permission</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($rolePermissions as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <input
                                                id="permission"
                                                name="permission[]"
                                                type="checkbox"
                                                value="{{$item->id}}"
                                                    >
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                           <td>Data Empty</td>
                                        </tr>
                                        @endforelse
                                        
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-sm-12 mt-4">
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
@endsection