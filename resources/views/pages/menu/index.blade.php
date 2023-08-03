@extends('master')
@section('content')
<div class="content container-fluid">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">Menu</h3>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table comman-shadow">
                <div class="card-body">

                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Menu</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="{{ route('managemenulist.create')}}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i> Add Data</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table
                            class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Level</th>
                                    <th>Active</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($menulist as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->link }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>{{ $item->Status->name }}</td>
                                    <td class="text-end">
                                        <div class="actions ">
                                            <a href="{{ route('managemenulist.show',$item->id)}}"
                                                class="btn btn-sm bg-success-light me-2 ">
                                                <i class="feather-eye"></i>
                                            </a>
                                            <a href="{{route('managemenulist.edit',$item->id)}}" class="btn btn-sm bg-danger-light">
                                                <i class="feather-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr> 
                                @empty
                                    <tr>
                                        <td rowspan="6">Data Empty</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>

@endsection