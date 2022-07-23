<!-- View Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
     aria-labelledby="editGeneralSetting" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGeneralSetting">Edit General Setting </h5>
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
            <form action="{{ route('getGeneralSetting.update', $generalSetting->id)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label">Title</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ $generalSetting->title }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tagline" class="col-md-2 col-form-label">Tagline</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="tagline" name="tagline"
                                   value="{{ $generalSetting->tagline }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">Official Email</label>
                        <div class="col-md-10">
                            <input class="form-control" id="email" name="email[]"
                                   value="@foreach(($generalSetting->email) as $email){{$email}}@endforeach">
                            <small>Multiple email supported. Separated by comma (,).</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="number" class="col-md-2 col-form-label">Official Number</label>
                        <div class="col-md-10">
                            <input class="form-control" id="number" name="number[]"
                                   value="@foreach(($generalSetting->number) as $number){{$number}}@endforeach">
                            <small>Multiple email supported. Separated by comma (,).</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-2 col-form-label">Address</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="address" name="address"
                                   value="{{ $generalSetting->address }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label">Description</label>
                        <div class="col-md-10">
                            <div class="tinymce-wrap">
                                <textarea class="form-control" id="description" name="description" required>
                                    {{ $generalSetting->description }}
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="footer_copyright" class="col-md-2 col-form-label">Footer
                            Copyright</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="footer_copyright" name="footer_copyright"
                                   value="{{ $generalSetting->footer_copyright }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="footer_about_us" class="col-md-2 col-form-label">Footer About Us</label>
                        <div class="col-md-10">
                            <div class="tinymce-wrap">
                                <textarea class="form-control" id="footer_about_us" name="footer_about_us"
                                          required>
                                     {{ $generalSetting->footer_about_us }}
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact_map" class="col-md-2 col-form-label">Contact Map Iframe</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="contact_map" name="contact_map"
                                   value="{{ $generalSetting->contact_map }}">
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
