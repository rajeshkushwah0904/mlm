@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>popup_banner List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Popup Banner List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <a href="{{route('backend.popup_banners.create')}}" class="btn btn-sm btn-info">Add Popup Banner</a>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Popup Banner List</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Action</th>
                                        <th>Status</th>
                                        <th>Popup Name</th>
                                        <th>Image</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($popup_banners as $key=>$popup_banner)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @if($popup_banner->status==1)
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.popup_banners.in_active',$popup_banner->id)}}">In Active</a>
                                                    </li>
                                                    @else
 <li>
     <a class="dropdown-item" href="{{route('backend.popup_banners.active',$popup_banner->id)}}">active</a>
                                                    </li>
                                                    @endif
                                                     <li><a class="dropdown-item"
                                                            href="{{route('backend.popup_banners.delete',$popup_banner->id)}}">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            @if($popup_banner->status==1)
                                            <button class="btn btn-sm btn-info">Active</button>
                                            @else
                                            <button class="btn btn-sm btn-danger">Inactive</button>
                                            @endif

                                        </td>
                                        <td>{{$popup_banner->document_name}}</td>
                                        <td><img src="{{asset($popup_banner->image)}}"style="width: 100%"></td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@stop