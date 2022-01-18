@extends('backend.theme.formtheme')
@section('content')
<style type="text/css">
/*Now the CSS*/
* {
    margin: 0;
    padding: 0;
}

.tree ul {
    padding-top: 20px;
    position: relative;

    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.tree li {
    float: left;
    text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 5px 0 5px;

    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before,
.tree li::after {
    content: '';
    position: absolute;
    top: 0;
    right: 50%;
    border-top: 1px solid #ccc;
    width: 50%;
    height: 20px;
}

.tree li::after {
    right: auto;
    left: 50%;
    border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without
any siblings*/
.tree li:only-child::after,
.tree li:only-child::before {
    display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child {
    padding-top: 0;
}

/*Remove left connector from first child and
right connector from last child*/
.tree li:first-child::before,
.tree li:last-child::after {
    border: 0 none;
}

/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before {
    border-right: 1px solid #ccc;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}

.tree li:first-child::after {
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    border-left: 1px solid #ccc;
    width: 0;
    height: 20px;
}

.tree li a {
    border: 1px solid #ccc;
    padding: 5px 10px;
    text-decoration: none;
    color: #666;
    font-family: arial, verdana, tahoma;
    font-size: 11px;
    display: inline-block;

    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;

    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover,
.tree li a:hover+ul li a {
    background: #c8e4f8;
    color: #000;
    border: 1px solid #94a0b4;
}

/*Connector styles on hover*/
.tree li a:hover+ul li::after,
.tree li a:hover+ul li::before,
.tree li a:hover+ul::before,
.tree li a:hover+ul ul::before {
    border-color: #94a0b4;
}

.tree {
    height: 100%;
    width: 960px;
}

.treecontent2 {
    width: 1600px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tree View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tree View</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" style="overflow: auto">
        <div class="tree">
            <div class="treecontent2">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">

                                Free Distributor : <input type="color" value="#EDE83D" disabled>Yellow,
                                Package
                                Distributor : <input type="color" value="#77E387" disabled>Green,Block Distributor :
                                <input type="color" value="#5A5A5A" disabled>Black
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                            <ul>
                                <li class="nav-item dropdown">
                                    @if($distributor->status==2)
                                    <a data-toggle="dropdown" href="#" style="background: #5A5A5A">
                                        @else
                                        @if($distributor->package)
                                        <a data-toggle="dropdown" href="#" style="background: #77E387">
                                            @else
                                            <a data-toggle="dropdown" href="#" style="background: #EDE83D">
                                                @endif
                                                @endif

                                                @if($distributor->gender=='Female')
                                                <img class="profile-user-img img-fluid img-circle"
                                                    src="{{asset('backendtheme/female_user.png')}}"
                                                    alt="User profile picture">
                                                @else
                                                <img class="profile-user-img img-fluid img-circle"
                                                    src="{{asset('backendtheme/distributor_icon.png')}}"
                                                    alt="User profile picture">
                                                @endif
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                <span
                                                    class="dropdown-item dropdown-header">{{$distributor->name}}<br>{{$distributor->distributor_tracking_id}}</span>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item">
                                                    Joining Date
                                                    <span class="float-right text-muted text-sm">
                                                        @if($distributor->created_at)
                                                        {{$distributor->created_at->format('d-M-Y')}}
                                                        @endif
                                                    </span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item"> Activation Date
                                                    <span class="float-right text-muted text-sm">
                                                        @if($distributor->activate_date)
                                                        {{$distributor->activate_date->format('d-M-Y')}}
                                                        @endif
                                                    </span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item"> Package
                                                    <span class="float-right text-muted text-sm">
                                                        @if($distributor->package)
                                                        {{$distributor->package->package_name}}
                                                        ({{$distributor->package->amount}} )
                                                        @else
                                                        Free
                                                        @endif
                                                    </span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item"> Total Direct
                                                    <span class="float-right text-muted text-sm">
                                                        @if($distributor->total_direct)
                                                        {{count($distributor->total_direct)}}
                                                        @endif
                                                    </span>
                                                </a>
                                            </div>
                                            <br>
                                            <a
                                                href="#">{{$distributor->distributor_tracking_id}}<br>{{$distributor->name}}</a>
                                            <ul>
                                                @foreach($distributor->first_level_distributors as
                                                $first_level_distributor1)
                                                <li>
                                                    @if($first_level_distributor1->status==2)
                                                    <a data-toggle="dropdown" href="#" style="background: #5A5A5A">
                                                        @else
                                                        @if($first_level_distributor1->package)
                                                        <a data-toggle="dropdown" href="#" style="background: #77E387">
                                                            @else
                                                            <a data-toggle="dropdown" href="#"
                                                                style="background: #EDE83D">
                                                                @endif
                                                                @endif
                                                                @if($first_level_distributor1->gender=='Female')
                                                                <img class="profile-user-img img-fluid img-circle"
                                                                    src="{{asset('backendtheme/female_user.png')}}"
                                                                    alt="User profile picture">
                                                                @else
                                                                <img class="profile-user-img img-fluid img-circle"
                                                                    src="{{asset('backendtheme/distributor_icon.png')}}"
                                                                    alt="User profile picture">
                                                                @endif
                                                            </a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                                <span
                                                                    class="dropdown-item dropdown-header">{{$first_level_distributor1->name}}<br>{{$first_level_distributor1->distributor_tracking_id}}</span>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item">
                                                                    Joining Date
                                                                    <span class="float-right text-muted text-sm">
                                                                        @if($first_level_distributor1->created_at)
                                                                        {{$first_level_distributor1->created_at->format('d-M-Y')}}
                                                                        @endif
                                                                    </span>
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item"> Activation Date
                                                                    <span class="float-right text-muted text-sm">
                                                                        @if($first_level_distributor1->activate_date)
                                                                        {{$first_level_distributor1->activate_date->format('d-M-Y')}}
                                                                        @endif
                                                                    </span>
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item"> Package
                                                                    <span class="float-right text-muted text-sm">
                                                                        @if($first_level_distributor1->package)
                                                                        {{$first_level_distributor1->package->package_name}}
                                                                        ({{$first_level_distributor1->package->amount}}
                                                                        )
                                                                        @else
                                                                        Free
                                                                        @endif
                                                                    </span>
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="#" class="dropdown-item"> Total Direct
                                                                    <span class="float-right text-muted text-sm">
                                                                        @if($first_level_distributor1->total_direct)
                                                                        {{count($first_level_distributor1->total_direct)}}
                                                                        @endif
                                                                    </span>
                                                                </a>
                                                            </div><br>
                                                            <a
                                                                href="#">{{$first_level_distributor1->distributor_tracking_id}}<br>{{$first_level_distributor1->name}}</a>
                                                            <ul>
                                                                @foreach($first_level_distributor1->first_level_distributors
                                                                as
                                                                $first_level_distributor2)
                                                                <li>
                                                                    @if($first_level_distributor2->status==2)
                                                                    <a data-toggle="dropdown" href="#"
                                                                        style="background: #5A5A5A">
                                                                        @else
                                                                        @if($first_level_distributor2->package)
                                                                        <a data-toggle="dropdown" href="#"
                                                                            style="background: #77E387">
                                                                            @else
                                                                            <a data-toggle="dropdown" href="#"
                                                                                style="background: #EDE83D">
                                                                                @endif
                                                                                @endif
                                                                                @if($first_level_distributor2->gender=='Female')
                                                                                <img class="profile-user-img img-fluid img-circle"
                                                                                    src="{{asset('backendtheme/female_user.png')}}"
                                                                                    alt="User profile picture">
                                                                                @else
                                                                                <img class="profile-user-img img-fluid img-circle"
                                                                                    src="{{asset('backendtheme/distributor_icon.png')}}"
                                                                                    alt="User profile picture">
                                                                                @endif
                                                                            </a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                                                <span
                                                                                    class="dropdown-item dropdown-header">{{$first_level_distributor2->name}}<br>{{$first_level_distributor2->distributor_tracking_id}}</span>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a href="#" class="dropdown-item">
                                                                                    Joining Date
                                                                                    <span
                                                                                        class="float-right text-muted text-sm">
                                                                                        @if($first_level_distributor2->created_at)
                                                                                        {{$first_level_distributor2->created_at->format('d-M-Y')}}
                                                                                        @endif
                                                                                    </span>
                                                                                </a>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a href="#" class="dropdown-item">
                                                                                    Activation
                                                                                    Date
                                                                                    <span
                                                                                        class="float-right text-muted text-sm">
                                                                                        @if($first_level_distributor2->activate_date)
                                                                                        {{$first_level_distributor2->activate_date->format('d-M-Y')}}
                                                                                        @endif
                                                                                    </span>
                                                                                </a>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a href="#" class="dropdown-item">
                                                                                    Package
                                                                                    <span
                                                                                        class="float-right text-muted text-sm">
                                                                                        @if($first_level_distributor2->package)
                                                                                        {{$first_level_distributor2->package->package_name}}
                                                                                        ({{$first_level_distributor2->package->amount}}
                                                                                        )
                                                                                        @else
                                                                                        Free
                                                                                        @endif
                                                                                    </span>
                                                                                </a>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a href="#" class="dropdown-item"> Total
                                                                                    Direct
                                                                                    <span
                                                                                        class="float-right text-muted text-sm">
                                                                                        @if($first_level_distributor2->total_direct)
                                                                                        {{count($first_level_distributor2->total_direct)}}
                                                                                        @endif
                                                                                    </span>
                                                                                </a>
                                                                            </div><br>
                                                                            <a
                                                                                href="#">{{ $first_level_distributor2->distributor_tracking_id}}<br>{{$first_level_distributor2->name}}</a>
                                                                            <ul>
                                                                                @foreach($first_level_distributor2->first_level_distributors
                                                                                as
                                                                                $first_level_distributor3)

                                                                                <li>
                                                                                    @if($first_level_distributor3->status==2)
                                                                                    <a data-toggle="dropdown" href="#"
                                                                                        style="background: #5A5A5A">
                                                                                        @else
                                                                                        @if($first_level_distributor3->package)
                                                                                        <a data-toggle="dropdown"
                                                                                            href="#"
                                                                                            style="background: #77E387">
                                                                                            @else
                                                                                            <a data-toggle="dropdown"
                                                                                                href="#"
                                                                                                style="background: #EDE83D">
                                                                                                @endif
                                                                                                @endif
                                                                                                @if($first_level_distributor3->gender=="Female")
                                                                                                <img class="profile-user-img img-fluid img-circle"
                                                                                                    src="{{asset('backendtheme/female_user.png')}}"
                                                                                                    alt="User profile picture">
                                                                                                @else
                                                                                                <img class="profile-user-img img-fluid img-circle"
                                                                                                    src="{{asset('backendtheme/distributor_icon.png')}}"
                                                                                                    alt="User profile picture">
                                                                                                @endif
                                                                                            </a>
                                                                                            <div
                                                                                                class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                                                                <span
                                                                                                    class="dropdown-item dropdown-header">{{$first_level_distributor3->name}}<br>{{$first_level_distributor3->distributor_tracking_id}}</span>
                                                                                                <div
                                                                                                    class="dropdown-divider">
                                                                                                </div>
                                                                                                <a href="#"
                                                                                                    class="dropdown-item">
                                                                                                    Joining Date
                                                                                                    <span
                                                                                                        class="float-right text-muted text-sm">
                                                                                                        @if($first_level_distributor3->created_at)
                                                                                                        {{$first_level_distributor3->created_at->format('d-M-Y')}}
                                                                                                        @endif
                                                                                                    </span>
                                                                                                </a>
                                                                                                <div
                                                                                                    class="dropdown-divider">
                                                                                                </div>
                                                                                                <a href="#"
                                                                                                    class="dropdown-item">
                                                                                                    Activation
                                                                                                    Date
                                                                                                    <span
                                                                                                        class="float-right text-muted text-sm">
                                                                                                        @if($first_level_distributor3->activate_date)
                                                                                                        {{$first_level_distributor3->activate_date->format('d-M-Y')}}
                                                                                                        @endif
                                                                                                    </span>
                                                                                                </a>
                                                                                                <div
                                                                                                    class="dropdown-divider">
                                                                                                </div>
                                                                                                <a href="#"
                                                                                                    class="dropdown-item">
                                                                                                    Package
                                                                                                    <span
                                                                                                        class="float-right text-muted text-sm">
                                                                                                        @if($first_level_distributor3->package)
                                                                                                        {{$first_level_distributor3->package->package_name}}
                                                                                                        ({{$first_level_distributor3->package->amount}})
                                                                                                        @else
                                                                                                        Free
                                                                                                        @endif
                                                                                                    </span>
                                                                                                </a>
                                                                                                <div
                                                                                                    class="dropdown-divider">
                                                                                                </div>
                                                                                                <a href="#"
                                                                                                    class="dropdown-item">
                                                                                                    Total
                                                                                                    Direct
                                                                                                    <span
                                                                                                        class="float-right text-muted text-sm">
                                                                                                        @if($first_level_distributor3->total_direct)
                                                                                                        {{count($first_level_distributor3->total_direct)}}
                                                                                                        @endif
                                                                                                    </span>
                                                                                                </a>
                                                                                            </div><br>
                                                                                            <a
                                                                                                href="#">{{$first_level_distributor3->distributor_tracking_id}}<br>{{$first_level_distributor3->name}}</a>
                                                                                            <ul>
                                                                                                @foreach($first_level_distributor3->first_level_distributors
                                                                                                as
                                                                                                $first_level_distributor4)
                                                                                                <li>
                                                                                                    @if($first_level_distributor4->status==2)
                                                                                                    <a data-toggle="dropdown"
                                                                                                        href="#"
                                                                                                        style="background: #5A5A5A">
                                                                                                        @else
                                                                                                        @if($first_level_distributor4->package)
                                                                                                        <a data-toggle="dropdown"
                                                                                                            href="#"
                                                                                                            style="background: #77E387">
                                                                                                            @else
                                                                                                            <a data-toggle="dropdown"
                                                                                                                href="#"
                                                                                                                style="background: #EDE83D">
                                                                                                                @endif
                                                                                                                @endif
                                                                                                                @if($first_level_distributor4->gender=='Female')
                                                                                                                <img class="profile-user-img img-fluid img-circle"
                                                                                                                    src="{{asset('backendtheme/female_user.png')}}"
                                                                                                                    alt="User profile picture">
                                                                                                                @else
                                                                                                                <img class="profile-user-img img-fluid img-circle"
                                                                                                                    src="{{asset('backendtheme/distributor_icon.png')}}"
                                                                                                                    alt="User profile picture">
                                                                                                                @endif
                                                                                                            </a>
                                                                                                            <div
                                                                                                                class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                                                                                <span
                                                                                                                    class="dropdown-item dropdown-header">{{$first_level_distributor4->name}}<br>{{$first_level_distributor4->distributor_tracking_id}}</span>
                                                                                                                <div
                                                                                                                    class="dropdown-divider">
                                                                                                                </div>
                                                                                                                <a href="#"
                                                                                                                    class="dropdown-item">
                                                                                                                    Joining
                                                                                                                    Date
                                                                                                                    <span
                                                                                                                        class="float-right text-muted text-sm">
                                                                                                                        @if($first_level_distributor4->created_at)
                                                                                                                        {{$first_level_distributor4->created_at->format('d-M-Y')}}
                                                                                                                        @endif
                                                                                                                    </span>
                                                                                                                </a>
                                                                                                                <div
                                                                                                                    class="dropdown-divider">
                                                                                                                </div>
                                                                                                                <a href="#"
                                                                                                                    class="dropdown-item">
                                                                                                                    Activation
                                                                                                                    Date
                                                                                                                    <span
                                                                                                                        class="float-right text-muted text-sm">
                                                                                                                        @if($first_level_distributor4->activate_date)
                                                                                                                        {{$first_level_distributor4->activate_date->format('d-M-Y')}}
                                                                                                                        @endif
                                                                                                                    </span>
                                                                                                                </a>
                                                                                                                <div
                                                                                                                    class="dropdown-divider">
                                                                                                                </div>
                                                                                                                <a href="#"
                                                                                                                    class="dropdown-item">
                                                                                                                    Package
                                                                                                                    <span
                                                                                                                        class="float-right text-muted text-sm">
                                                                                                                        @if($first_level_distributor4->package)
                                                                                                                        {{$first_level_distributor4->package->package_name}}
                                                                                                                        ({{$first_level_distributor4->package->amount}})
                                                                                                                        @else
                                                                                                                        Free
                                                                                                                        @endif
                                                                                                                    </span>
                                                                                                                </a>
                                                                                                                <div
                                                                                                                    class="dropdown-divider">
                                                                                                                </div>
                                                                                                                <a href="#"
                                                                                                                    class="dropdown-item">
                                                                                                                    Total
                                                                                                                    Direct
                                                                                                                    <span
                                                                                                                        class="float-right text-muted text-sm">
                                                                                                                        @if($first_level_distributor4->total_direct)
                                                                                                                        {{count($first_level_distributor4->total_direct)}}
                                                                                                                        @endif
                                                                                                                    </span>
                                                                                                                </a>
                                                                                                            </div><br>
                                                                                                            <a
                                                                                                                href="#">{{$first_level_distributor4->distributor_tracking_id}}<br>{{$first_level_distributor4->name}}</a>
                                                                                                </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                </li>
                                                                                @endforeach
                                                                            </ul>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                </li>
                                                @endforeach

                                            </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- /.col -->

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