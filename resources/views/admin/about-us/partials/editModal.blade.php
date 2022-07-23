<!-- View Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
     aria-labelledby="editAbout" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAbout">Edit About </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('getAbout.update', $about->id)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="image" class="col-form-label col-md-2">Image</label>
                        <input class="form-control col-md-6" id="favicon" type="file" name="image">
                        <img id="image_preview" alt="Image Preview" class="col-md-2"
                             src="{{('images/about')}}/{{$about->image}}" width="250">
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label">Description</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="description"
                                      name="description">
                                {{ $about->description }}
                            </textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
