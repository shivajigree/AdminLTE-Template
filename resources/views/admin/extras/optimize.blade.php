@extends('admin.layouts.master')

@section('title', 'System Information')

@section('contents')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Cache Settings</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item">Cache Settings</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body ">
                                <h3>Clear Application Cache</h3>
                                <p class="mb-25 lead">Click the following link to clear the application cache.</p>
                                <button class="btn btn-success btn-rounded col-md-4 text-center"
                                        onclick="location.href='{{route('applicationCache')}}';">
                                    CACHE:CLEAR <i class="fa fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body ">
                                <h3>Clear Route Cache</h3>
                                <p class="mb-25 lead">Click the following link to clear the route cache.</p>
                                <button class="btn btn-danger btn-rounded col-md-4 text-center"
                                        onclick="location.href='{{route('routeCache')}}';">
                                    ROUTE:CLEAR <i class="fa fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body ">
                                <h3>Clear Configuration Cache</h3>
                                <p class="mb-25 lead">Click the following link to clear the config cache.</p>
                                <button class="btn btn-warning btn-rounded col-md-4 text-center"
                                        onclick="location.href='{{route('configCache')}}';">
                                    CONFIG:CLEAR <i class="fa fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body ">
                                <h3>Clear Compiled View Cache</h3>
                                <p class="mb-25 lead">Click the following link to clear the compiled view files.</p>
                                <button class="btn btn-info btn-rounded col-md-4 text-center"
                                        onclick="location.href='{{route('viewCache')}}';">
                                    VIEW:CLEAR <i class="fa fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop

