@push('css')
    <style>
        .view-page {
            font-size: 60%;
        }

        .view-page:hover {
            text-decoration: underline;
        }
    </style>
@endpush

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
                            <a type="button" class="btn btn-success float-right" wire:navigate
                                    href="getHomeSlider/create">
                                <i class="fa fa-plus"> Add New </i>
                            </a>
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
                                    <tr wire:key="{{$slider->id}}">
                                        <td></td>
                                        <td>{{ $slider->name }}</td>
                                        <td>{!! $slider->description !!}</td>
                                        <td><img src="{{url('images/sliders')}}/{{$slider->image}}" height="80px"
                                                 alt="Image" title="Slider {{ $slider->name }}"></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" title="Edit"
                                                    wire:click="edit({{$slider->id}})">
                                                <i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-warning" title="View"
                                                    data-toggle="modal" data-target="#viewModal{{$slider->id}}">
                                                <i class="fas fa-eye"></i></button>
                                            <button type="submit" class="btn btn-danger" title="Remove"
                                                    data-toggle="modal" data-target="#delModal{{$slider->id}}">
                                                <i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @include('livewire.home-slider.modals.view-modal')
                                    @include('livewire.home-slider.modals.delete-modal')

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
</div>
<!-- /.content-wrapper -->

@push('js')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('closeDeleteModal', (event) => {
                $('.modal').modal('hide');
                $('.modal-backdrop').remove(); // Remove the modal backdrop
            });
        });
    </script>
@endpush
