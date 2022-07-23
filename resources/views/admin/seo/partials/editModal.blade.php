<!-- View Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
     aria-labelledby="editSEOManager" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSEOManager">Edit SEO Manager </h5>
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
            <form action="{{ route('getSEO.update', $seo->id)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="meta_keywords" class="col-md-2 col-form-label">Meta Keywords</label>
                        <div class="col-md-10">
                            <input class="form-control" id="meta_keywords" name="meta_keywords[]"
                                   value="@foreach(($seo->meta_keywords) as $keyword){{$keyword}}@endforeach">
                            <small>Separate multiple keywords by ,(comma)</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="meta_description" class="col-md-2 col-form-label">Meta Description</label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="meta_description" name="meta_description"
                                      required>{{ $seo->meta_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="social_title" class="col-md-2 col-form-label">Social Title</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="social_title" name="social_title"
                                   value="{{ $seo->social_title }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="social_description" class="col-md-2 col-form-label">Social Description</label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="social_description" name="social_description"
                                      required>{{ $seo->social_description }}</textarea>
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
