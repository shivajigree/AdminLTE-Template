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
                        <h1 class="m-0 text-dark">System Information</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item">System Information</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="word-break: break-word; overflow-wrap: break-word;">
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>PHP Version</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ $sysinfo['server']['software']['php'] }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Laravel Version</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ app()->version() }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Server Software Architecture</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ $sysinfo['server']['software']['arc'] }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Webserver</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ $sysinfo['server']['software']['webserver'] }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Server IP</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ $sysinfo['host']['ip'] }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Client IP</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ $sysinfo['client']['ip'] }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>HTTP Host</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ app()->getNamespace() }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Database Driver</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ $sysinfo['database']['driver'] }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Database Driver Version</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ $sysinfo['database']['version']  }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Database Port</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ env('DB_PORT') }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>App Environment</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ app()->environment() }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>App Debug</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>
                                            @if(env('APP_DEBUG')==1)
                                                true
                                            @elseif(env('APP_DEBUG')==0)
                                                false
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Timezone</strong></h5>
                                    <div class="col-sm-9">
                                        <h4>{{ env('APP_TIMEZONE') }}</h4>
                                    </div>
                                </div>
                                <hr>
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
    <!-- /.content-wrapper -->
@stop
