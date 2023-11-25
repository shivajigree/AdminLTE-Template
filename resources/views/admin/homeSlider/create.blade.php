@extends('admin.layouts.master')

@section('title', 'HomeSlider Create')

@section('contents')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Home Slider</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('getHomeSlider') }}">Home Slider</a></li>
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
                                <h3 class="card-title">Home Slider Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="POST" action="{{url('getHomeSlider')}}" method="post"
                                  enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <small>
                                        <ul>
                                            {!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}
                                        </ul>
                                    </small>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">
                                            Name <span style="color: red">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   placeholder="Name" value="{{old('name')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">
                                            Description <span style="color: red">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" id="description"
                                                      name="description" placeholder="Description" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">
                                            Image <span style="color: red">*</span>
                                        </label>
                                        <div class=" col-sm-10">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image"
                                                           name="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                            </div>
                                            <small class="form-text text-muted">Only png, PNG, jpeg, JPEG, jpg, JPG are
                                                allowed.</small>
                                            <small class="form-text text-muted">Max 4MB size.</small>
                                            <small>
                                                <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="reset" class="btn btn-default float-right">Reset</button>
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
            $('#description').summernote()
        })
    </script>
    <script type="application/javascript">
        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
@stop
