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
                    <h3 class="page-title">Edit Menu</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('managemenulist.index')}}">Menu</a></li>
                        <li class="breadcrumb-item active">Edit Menu</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card comman-shadow">
                <div class="card-body">
                    <form action="{{ route('managemenulist.update', $menu->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title student-info">Menu Information <span>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Title <span class="login-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        type="text" 
                                        placeholder="Enter Title"
                                        name="title"
                                        id="title"
                                        maxlength="20"
                                        required
                                        value="{{ $menu->title }}"
                                        >
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Parent</label>
                                    <select class="form-control select" name="parent_id" id="parent_id">
                                        <option>Select Option</option>
                                        @foreach ($menuparent as $item )
                                            <option 
                                                value="{{$item->id}}"
                                                @if ($item->id == $menu->parent_id)
                                                    @selected(true)
                                                @endif>
                                                {{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Link <span class="login-danger">*</span></label>
                                    <input
                                        class="form-control" 
                                        type="text" 
                                        placeholder="Enter Link"
                                        name="link"
                                        id="link"
                                        value="{{ $menu->link }}"
                                        maxlength="20"
                                        >
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Level <span class="login-danger">*</span></label>
                                    <input
                                        class="form-control" 
                                        type="number" 
                                        placeholder="Enter Level"
                                        name="level"
                                        id="level"
                                        value="{{ $menu->level }}"
                                        maxlength="20"
                                        >
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Sequence <span class="login-danger">*</span></label>
                                    <input
                                        class="form-control" 
                                        type="number" 
                                        placeholder="Enter Sequence"
                                        name="sequence"
                                        id="sequence"
                                        maxlength="20"
                                        value="{{$menu->sequence }}"
                                        required
                                        >
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Icon <span class="login-danger">*</span></label>
                                    <input
                                        class="form-control" 
                                        type="text" 
                                        placeholder="Enter Icon"
                                        name="icon"
                                        id="icon"
                                        value="{{ $menu->icon }}"
                                        maxlength="20"
                                        >
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Status <span class="login-danger">*</span></label>
                                    <select id="status_id" name="status_id" class="form-control select" >
                                        @foreach ($statuses as $status)
                                            <option 
                                                value="{{$status->id}}"
                                                @if ($status->id == $menu->status_id)
                                                    @selected(true)
                                                @endif>
                                                {{ $status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
@endsection