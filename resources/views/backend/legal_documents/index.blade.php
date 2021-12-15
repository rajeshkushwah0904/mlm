@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>legal_document List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Legal Document List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <a href="{{route('backend.legal_documents.create')}}" class="btn btn-sm btn-info">Add Legal Document</a>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Legal Document List</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Action</th>
                                        <th>Status</th>
                                        <th>Document Name</th>
                                        <th>Image</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($legal_documents as $key=>$legal_document)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @if($legal_document->status==1)
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.legal_documents.in_active',$legal_document->id)}}">In Active</a>
                                                    </li>
                                                    @else
 <li>
     <a class="dropdown-item" href="{{route('backend.legal_documents.active',$legal_document->id)}}">active</a>
                                                    </li>
                                                    @endif
                                                     <li><a class="dropdown-item"
                                                            href="{{route('backend.legal_documents.delete',$legal_document->id)}}">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            @if($legal_document->status==1)
                                            <button class="btn btn-sm btn-info">Active</button>
                                            @else
                                            <button class="btn btn-sm btn-danger">Inactive</button>
                                            @endif

                                        </td>
                                        <td>{{$legal_document->document_name}}</td>
                                        <td><img src="{{asset($legal_document->image)}}"style="width: 100%"></td>

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