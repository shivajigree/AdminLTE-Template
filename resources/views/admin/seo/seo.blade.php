@extends('admin.layouts.master')

@section('title', 'SEO Manager')

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
                                @include('admin.seo.partials.editModal', $seo)
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="word-break: break-word; overflow-wrap: break-word;">
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Meta Keyword</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>
                                            @foreach(explode(',', implode(',', $seo->meta_keywords)) as $keywords)
                                                {{ $keywords }}@if(!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Meta Description</strong></h5>
                                    <div class="col-sm-9">
                                        <h5>{{ $seo->meta_description }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Social Title</strong></h5>
                                    <div class="col-sm-9">
                                        <h5> {{ $seo->social_title }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h5 class="col-sm-3"><strong>Social Description</strong></h5>
                                    <div class="col-sm-9">
                                        <h5> {{ $seo->social_description }}</h5>
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
