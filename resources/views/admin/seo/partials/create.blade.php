@extends('admin.layouts.master')

@section('title', 'SEO Manager Create')

@section('contents')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">SEO Manager</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('getSEO') }}">SEO Manager</a>
                            </li>
                            <li class="breadcrumb-item active">Create</li>
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
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">SEO Manager Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="POST"
                                  action="{{url('getSEO')}}" method="post"
                                  enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <small>
                                        <ul>
                                            {!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}
                                        </ul>
                                    </small>

                                    <div class="form-group row">
                                        <label for="meta_keywords" class="col-md-2 col-form-label">Meta Keywords</label>
                                        <div class="col-md-10">
                                            <input id="meta_keywords" name="meta_keywords[]" class="form-control"
                                                   multiple="multiple" required value="{{old('meta_keywords')}}">
                                            <small>Separate multiple keywords by ,(comma)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="meta_description" class="col-md-2 col-form-label">Meta
                                            Description</label>
                                        <div class="col-md-10">
                                        <textarea class="form-control" id="meta_description" name="meta_description"
                                                  required>{{ old('meta_description')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="social_title" class="col-md-2 col-form-label">Social Title</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="social_title" required
                                                   name="social_title" value="{{ old('social_title') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="social_description" class="col-md-2 col-form-label">Social
                                            Description</label>
                                        <div class="col-md-10">
                                        <textarea class="form-control" id="social_description"
                                                  name="social_description"
                                                  required>{{ old('social_description')}}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info" title="Submit">Submit</button>
                                    <button type="button" class="btn btn-default float-right" title="Edit"
                                            onclick="location.href='{{url()->previous()}}'">
                                        Cancel
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

@stop
