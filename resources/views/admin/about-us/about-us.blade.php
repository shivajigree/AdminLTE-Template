@extends('admin.layouts.master')

@section('title', 'About Us')

@section('contents')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">About Us</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item">About Us</li>
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
                                @include('admin.about-us.partials.editModal', $about)
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Description</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{!! $about->description !!}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Image</strong></h5>
                                    <div class="col-sm-9">
                                        <img src="{{url('images/about')}}/{{$about->image}}" height="300"
                                             alt="About" title="About">
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
            })
        });
    </script>
@stop
