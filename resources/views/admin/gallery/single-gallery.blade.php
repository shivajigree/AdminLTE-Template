@extends('admin.layouts.master')

@section('contents')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Gallery {{$gallery->name}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item">Gallery</li>
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
                                <h3 class="card-title float-left">Gallery {{$gallery->name}} Table</h3>
                                <button type="submit" class="btn btn-danger float-right" title=" Album"
                                        data-toggle="modal" data-target="#delAlbum">
                                    <i class="fas fa-trash"></i></button>
                                <button type="button" class="btn btn-primary float-right" title="Edit Album"
                                        onclick="location.href='{{route('getGallery.edit',$gallery->id)}}';">
                                    <i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-success float-right" title="Add"
                                        onclick="location.href='{{route('add_image',$gallery->id)}}';">
                                    <i class="fa fa-plus"> Add New Images to Album</i></button>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="delAlbum" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Gallery Deletion </h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure to delete the album
                                                    '<strong>{{ $gallery->name }}</strong>' ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger btn-default pull-left"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <form action="{{route('getGallery.destroy', $gallery->id)}}"
                                                      method="POST">
                                                    {{method_field('DELETE')}}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gallery->images as $item)
                                        <tr>
                                            <td></td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <img class="img-fluid" src="{{url('images/gallery')}}/{{$item->image}}"
                                                     alt="Photo" width="150">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning" title="View"
                                                        data-toggle="modal" data-target="#viewModal{{$item->id}}">
                                                    <i class="fas fa-eye"></i></button>
                                                <button type="submit" class="btn btn-danger" title="Remove"
                                                        data-toggle="modal" data-target="#delModal{{$item->id}}">
                                                    <i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- View Modal -->
                                        <div class="modal fade" id="viewModal{{$item->id}}" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">
                                                            {{ $item->name }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Name: {{ $item->name }}</p>
                                                        <img class="img-fluid"
                                                             src="{{url('images/gallery')}}/{{$item->image}}"
                                                             alt="Photo" width="150">
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
                                        <div class="modal fade" id="delModal{{$item->id}}" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Gallery Image Deletion </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure to delete the image
                                                            '<strong>{{$item->id}} {{ $item->name }}</strong>' ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger btn-default pull-left"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <form action="{{route('getGalleryImage.destroy', $item->id)}}"
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

@endsection
