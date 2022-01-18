@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>KYC Detail</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> KYC Detail</li>
                    </ol>
                </div>
            </div>
            @include('flash')

            @if($kyc)
            @include('backend.kycs.show')
            @else
            @include('backend.kycs.edit')
            @endif

            <br><br>
            <p>Declaration:- I {{$distributor->name}} declare that after any mis-happening/deceased, all the business
                goes to my nominee without any question/objections.</p>
            @if($nominee)
            @include('backend.nominees.show')
            @else
            @include('backend.nominees.edit')
            @endif

        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- /.content -->
</div>
@endsection