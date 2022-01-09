@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Update User Detail</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    {!!Form::open(['files'=>true,'class'=>'form-horizontal'])!!}
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{$user->name}}" required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-8">
                                    <input id="email" type="text" class="form-control" name="email"
                                        value="{{$user->email}}" readonly autofocus>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">mobile</label>
                                <div class="col-md-8">
                                    <input id="mobile" type="text" class="form-control" name="mobile"
                                        value="{{$user->mobile}}" required autofocus>
                                    @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-4 control-label">Role</label>
                                <div class="col-md-8">
                                    <select name="role" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="3">Distributor</option>
                                    </select>
                                    @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Module Name
                                    </th>
                                    <th>
                                        Index(List)
                                    </th>
                                    <th>
                                        Create
                                    </th>
                                    <th>
                                        Show
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                    <th>
                                        Delete
                                    </th>

                                </tr>
                            </thead>

                            <tbody>


                                @if(count($permissions))
                                {!!Form::open(['files'=>true,'class'=>'form-horizontal'])!!}
                                {{csrf_field()}}
                                @foreach($permissions as $key=>$permission)
                                <tr>
                                    <td>
                                        {{ $permission->module_name }}
                                        <input type="hidden" name="permission_id[{{$key}}]" value="{{$permission->id}}">
                                    </td>
                                    <td>
                                        @if($permission->p_index==1)
                                        <input type="checkbox" name="p_index[{{$key}}]" checked>
                                        @else
                                        <input type="checkbox" name="p_index[{{$key}}]">
                                        @endif
                                    </td>
                                    <td>
                                        @if($permission->p_create==1)
                                        <input type="checkbox" name="p_create[{{$key}}]" checked>
                                        @else
                                        <input type="checkbox" name="p_create[{{$key}}]">
                                        @endif
                                    </td>
                                    <td>
                                        @if($permission->p_view==1)
                                        <input type="checkbox" name="p_view[{{$key}}]" checked>
                                        @else
                                        <input type="checkbox" name="p_view[{{$key}}]">
                                        @endif
                                    </td>
                                    <td>
                                        @if($permission->p_edit==1)
                                        <input type="checkbox" name="p_edit[{{$key}}]" checked>
                                        @else
                                        <input type="checkbox" name="p_edit[{{$key}}]">
                                        @endif
                                    </td>
                                    <td>
                                        @if($permission->p_delete==1)
                                        <input type="checkbox" name="p_delete[{{$key}}]" checked>
                                        @else
                                        <input type="checkbox" name="p_delete[{{$key}}]">
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                {!!Form::open(['files'=>true,'class'=>'form-horizontal'])!!}
                                {{csrf_field()}}
                                @foreach($module_permissions as $key=>$module_permission)
                                <tr>
                                    <td>
                                        {{$module_permission->display_name}}
                                        <input type="hidden" name="module_id[{{$key}}]"
                                            value="{{$module_permission->id}}">
                                        <input type="hidden" name="module_name[{{$key}}]"
                                            value="{{$module_permission->route_name}}">
                                        <input type="hidden" name="role_id[{{$key}}]"
                                            value="{{$module_permission->role_id}}">
                                        <input type="hidden" name="user_id[{{$key}}]" value="{{$user->id}}">

                                    </td>
                                    <td>
                                        <input type="checkbox" name="p_index[{{$key}}]" checked>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="p_create[{{$key}}]" checked>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="p_view[{{$key}}]" checked>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="p_edit[{{$key}}]" checked>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="p_delete[{{$key}}]" checked>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                <tr>
                                    <td>
                                    </td>
                                    <td colspan="4">
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {!!Form::close()!!}
                            </tbody>

                        </table>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- /.row -->
                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection