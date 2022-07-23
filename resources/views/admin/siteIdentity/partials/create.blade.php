@extends('admin.layouts.master')

@section('title', 'Site Identity Create')

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
                                <h3 class="card-title">Site Identity Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="POST"
                                  action="{{url('getSiteIdentity')}}" method="post"
                                  enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <small>
                                        <ul>
                                            {!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}
                                        </ul>
                                    </small>

                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="logo" class="col-form-label">Logo</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="logo" type="file" name="logo" required>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top: 10px">
                                                <div class="col-md-3">
                                                    <label for="favicon" class="col-form-label">Favicon</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="favicon" type="file" name="favicon"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img id="logo_preview" alt="Logo Preview"
                                                         src=" {{ asset('images/product_image_not_found.gif') }}"
                                                         style="max-height: 150px;display: block; margin-left: auto; margin-right: auto"/>
                                                    <p>Logo</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <img id="favicon_preview" alt="Favicon Preview"
                                                         src=" {{ asset('images/product_image_not_found.gif') }}"
                                                         style="max-height: 150px;display: block; margin-left: auto; margin-right: auto"/>
                                                    <p>Favicon</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="version" class="col-md-2 col-form-label">Version</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="version" name="version"
                                                   value="{{ old('version') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="facebook" class="col-md-2 col-form-label">Facebook</label>
                                        <div class="col-md-10">
                                            <input type="url" class="form-control" id="facebook" name="facebook"
                                                   value="{{ old('facebook') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="twitter" class="col-md-2 col-form-label">Twitter</label>
                                        <div class="col-md-10">
                                            <input type="url" class="form-control" id="twitter" name="twitter"
                                                   value="{{ old('twitter') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="instagram" class="col-md-2 col-form-label">Instagram</label>
                                        <div class="col-md-10">
                                            <input type="url" class="form-control" id="instagram" name="instagram"
                                                   value="{{ old('instagram') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="youtube" class="col-md-2 col-form-label">Youtube</label>
                                        <div class="col-md-10">
                                            <input type="url" class="form-control" id="youtube" name="youtube"
                                                   value="{{ old('youtube') }}">
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
    <script type="application/javascript">
        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
    <script>
        $('#logo').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#logo_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#favicon').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#favicon_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@stop
