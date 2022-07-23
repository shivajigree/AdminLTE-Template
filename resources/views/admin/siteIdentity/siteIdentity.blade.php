@extends('admin.layouts.master')

@section('title', 'Site Identity')

@section('contents')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Site Identity</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('getSiteIdentity') }}">Site Identity</a></li>
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
                            <div class="card-header">
                                <h3 class="card-title float-left"></h3>
                                <button type="button" class="btn btn-success float-right"
                                        data-toggle="modal" data-target="#editModal">
                                    <i class="fa fa-edit"> Edit Information</i>
                                </button>
                                @include('admin.siteIdentity.partials.editModal', $siteIdentity)
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Logo Image</strong></h5>
                                    <div class="col-sm-9">
                                        <img src="{{ ('logo') }}/{{$siteIdentity->logo}}" alt="" height="150px;">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Favicon Image</strong></h5>
                                    <div class="col-sm-9">
                                        <img src="{{ ('logo') }}/{{$siteIdentity->favicon}}" alt="" height="48px;">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Version</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{{ $siteIdentity->version }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Facebook</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{{ $siteIdentity->facebook ?? 'Blank' }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Twitter</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{{ $siteIdentity->twitter ?? 'Blank' }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Instagram</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{{ $siteIdentity->instagram ?? 'Blank' }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Youtube</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{{ $siteIdentity->youtube ?? 'Blank' }}</h5>
                                    </div>
                                </div>

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
