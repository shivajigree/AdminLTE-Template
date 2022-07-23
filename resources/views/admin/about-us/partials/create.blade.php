@extends('admin.layouts.master')

@section('title', 'About Us Create')

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
                            <li class="breadcrumb-item active">Edit</li>
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
                                <h3 class="card-title">About Us Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="POST"
                                  action="{{url('getAbout')}}" method="post"
                                  enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <small>
                                        <ul>
                                            {!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}
                                        </ul>
                                    </small>
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" id="description"
                                                      name="description">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 form-control-label">Image</label>
                                        <div class="col-sm-10">
                                            <img src="{{ asset('images/product_image_not_found.gif') }}"
                                                 height="150" id="image_preview" alt="About" title="About">
                                            <input type="file" id="image" name="image"
                                                   class="form-control-file">
                                            <small class="form-text text-muted">
                                                Only png, PNG, jpeg, JPEG, jpg, JPG are
                                                allowed. <br/>Size must be below 4MB.</small>
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
            })
        });
    </script>
    <script type="application/javascript">
        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
    <script type="application/javascript">
        $('#image').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@stop
