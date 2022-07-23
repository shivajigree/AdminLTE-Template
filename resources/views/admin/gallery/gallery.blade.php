@extends('admin.layouts.master')

@section('contents')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Gallery</h1>
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
                                <h3 class="card-title float-left">Gallery Table</h3>
                                <button type="button" class="btn btn-success float-right"
                                        onclick="location.href='{{route('getGallery.create')}}';">
                                    <i class="fa fa-plus"> Add New Album</i>
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="post">
                                    <div class="row">
                                        @foreach($galleries as $gallery)
                                            <div class="col-sm-4"
                                                 onclick="location.href='{{route('getGalleryImage.show',$gallery->id)}}';">
                                                <img class="img-fluid"
                                                     src="{{url('images/gallery')}}/{{$gallery->image}}"
                                                     alt="Photo" width="350" style="object-fit: cover;height: 220px;">
                                                <h5 class="float-left" style="color: #016cc7">{{$gallery->name}}</h5>
                                                <h6 class="float-right">{{count($gallery->images)}} photos</h6>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                {{--<table id="table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Author</th>
                                        <th>Tags</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td></td>
                                            <td>{{ $post->name }}</td>
                                            <td>{{ $post->type }}</td>
                                            <td>{{ $post->author ?? 'Null'}}</td>
                                            <td>
                                                @foreach($post->tags as $tag)
                                                    <span class="badge bg-info">{{ $tag->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($post->status == 'true')
                                                    Published
                                                @else
                                                    Draft
                                                @endif
                                            </td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" title="Edit"
                                                        onclick="location.href='{{route('getGallery.edit',$post->id)}}';">
                                                    <i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-warning" title="View"
                                                        data-toggle="modal" data-target="#viewModal{{$post->id}}">
                                                    <i class="fas fa-eye"></i></button>
                                                <button type="submit" class="btn btn-danger" title="Remove"
                                                        data-toggle="modal" data-target="#delModal{{$post->id}}">
                                                    <i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- View Modal -->
                                        <div class="modal fade" id="viewModal{{$post->id}}" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">
                                                            Post {{$post->type}} {{ $post->name }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Name: {{ $post->name }}</p>
                                                        <p>Description : {!! $post->body !!}</p>
                                                        <p>Filename
                                                            @if(!empty($post->file))
                                                                <a href="{{url('images/posts')}}/{{ $post->file }}">
                                                                    Click here to download - {{ $post->file }}</a>
                                                            @else
                                                                Not Uploaded
                                                            @endif
                                                        </p>
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
                                        <div class="modal fade" id="delModal{{$post->id}}" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Post Deletion </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure to delete the post
                                                            '<strong>{{$post->id}} {{ $post->name }}</strong>' ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger btn-default pull-left"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <form action="{{route('getGallery.destroy', $post->id)}}"
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
                                        <th>Type</th>
                                        <th>Author</th>
                                        <th>Tags</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>--}}
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
