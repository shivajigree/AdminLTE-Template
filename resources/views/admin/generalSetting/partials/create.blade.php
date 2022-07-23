@extends('admin.layouts.master')

@section('title', 'General Setting Create')

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
                                <h3 class="card-title">General Setting Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="POST"
                                  action="{{url('getGeneralSetting')}}" method="post"
                                  enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <small>
                                        <ul>
                                            {!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}
                                        </ul>
                                    </small>

                                    <div class="form-group row">
                                        <label for="title" class="col-md-2 col-form-label">Title</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="title" name="title"
                                                   value="{{ old('title') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tagline" class="col-md-2 col-form-label">Tagline</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="tagline" name="tagline"
                                                   value="{{ old('tagline') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label">Official Email</label>
                                        <div class="col-md-10">
                                            <input id="email" name="email[]" class="form-control" multiple="multiple"
                                                   required>
                                            <small>Multiple email supported. Separated by comma (,).</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="number" class="col-md-2 col-form-label">Official Number</label>
                                        <div class="col-md-10">
                                            <input id="number" name="number[]" class="form-control" multiple="multiple"
                                                   required>
                                            <small>Multiple number supported. Separated by comma (,).</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="address" class="col-md-2 col-form-label">Address</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="address" name="address"
                                                   value="{{ old('address') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="description" class="col-md-2 col-form-label">Description</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="description"
                                                      name="description">{{ old('description')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="footer_copyright" class="col-md-2 col-form-label">Footer
                                            Copyright</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="footer_copyright" required
                                                   name="footer_copyright" value="{{ old('footer_copyright') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="footer_about_us" class="col-md-2 col-form-label">Footer About
                                            Us</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="footer_about_us"
                                                      name="footer_about_us">{{ old('footer_about_us')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="contact_map" class="col-md-2 col-form-label">Contact Map
                                            Iframe</label>
                                        <div class="col-md-10">
                                        <textarea class="form-control" id="contact_map" name="contact_map"
                                                  required>{{ old('contact_map')}}</textarea>
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
