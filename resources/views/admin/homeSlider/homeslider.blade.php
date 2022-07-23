@extends('admin.layouts.master')

@section('title', 'HomeSlider')

@section('styles')
    <style>
        .view-page {
            font-size: 60%;
        }
        .view-page:hover{
            text-decoration: underline;
        }
    </style>
@stop

@section('contents')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Home Slider
                            <a href="/" class="view-page">(View Page)</a>
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item">Home Slider</li>
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
                                <h3 class="card-title float-left">Home Sliders Table</h3>
                                <button type="button" class="btn btn-success float-right"
                                        onclick="location.href='{{route('getHomeSlider.create')}}';">
                                    <i class="fa fa-plus"> Add New </i>
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <td></td>
                                            <td>{{ $slider->name }}</td>
                                            <td>{!! $slider->description !!}</td>
                                            <td><img src="{{url('images/sliders')}}/{{$slider->image}}" height="80px"
                                                     alt="Image" title="Slider {{ $slider->name }}"></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" title="Edit"
                                                        onclick="location.href='{{route('getHomeSlider.edit',$slider->id)}}';">
                                                    <i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-warning" title="View"
                                                        data-toggle="modal" data-target="#viewModal{{$slider->id}}">
                                                    <i class="fas fa-eye"></i></button>
                                                <button type="submit" class="btn btn-danger" title="Remove"
                                                        data-toggle="modal" data-target="#delModal{{$slider->id}}">
                                                    <i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- View Modal -->
                                        <div class="modal fade" id="viewModal{{$slider->id}}" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">
                                                            Slider {{$slider->id}} {{ $slider->name }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{url('images/sliders')}}/{{$slider->image}}"
                                                             height="80px" alt="Image"
                                                             title="{{$slider->image}}">
                                                        <p>Name: {{ $slider->name }}</p>
                                                        <p>Description : {!! $slider->description !!}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger btn-default pull-left"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delModal{{$slider->id}}" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <h4 class="modal-title">Home Slider Deletion </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure to delete the slider
                                                            '<strong>{{$slider->id}} {{ $slider->name }}</strong>' ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger btn-default pull-left"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <form action="{{route('getHomeSlider.destroy', $slider->id)}}"
                                                              method="POST">
                                                            {{method_field('DELETE')}}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
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
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

@stop
