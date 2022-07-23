@extends('admin.layouts.master')

@section('title', 'General Setting')

@section('contents')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">General Setting</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('getGeneralSetting') }}">General Setting</a>
                            </li>
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
                                @include('admin.generalSetting.partials.editModal', $generalSetting)
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Title</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{!! $generalSetting->title !!}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Tagline</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{{ $generalSetting->tagline }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Email</strong></h5>
                                    <div class="col-sm-9">
                                        <h5> {{ $generalSetting->email[0] }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Number</strong></h5>
                                    <div class="col-sm-9">
                                        <h5> {{ $generalSetting->number[0] }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Address</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{{ $generalSetting->address }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Description</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{!! $generalSetting->description !!} </h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Footer Copyright Text</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{{ $generalSetting->footer_copyright }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Footer About Us</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{!! $generalSetting->footer_about_us !!}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Contact Map Iframe</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{{ $generalSetting->contact_map }}</h5>
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


@section('js')
    <script>
        $(function () {
            $('#description').summernote({
                codemirror: {
                    //     mode: 'text/html',
                    //     htmlMode: true,
                    //     lineNumbers: true,
                    lineWrapping: true,
                    //     theme: 'monokai'
                }
            });
            $('#footer_about_us').summernote({
                codemirror: {
                    //     mode: 'text/html',
                    //     htmlMode: true,
                    //     lineNumbers: true,
                    lineWrapping: true,
                    //     theme: 'monokai'
                }
            });
        });
    </script>
@stop
