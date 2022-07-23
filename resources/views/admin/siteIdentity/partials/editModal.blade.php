<!-- View Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
     aria-labelledby="editSiteIdentity" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSiteIdentity">Edit Site Identity </h5>
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
            <form action="{{ route('getSiteIdentity.update', $siteIdentity->id)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="logo" class="col-form-label col-md-2">Logo</label>
                        <input class="form-control col-md-6" id="logo" type="file" name="logo">
                        <img id="logo_preview" alt="Logo Preview" class="col-md-4"
                             src="{{('logo')}}/{{$siteIdentity->logo}}"
                             style="max-height: 150px;display: block; margin-left: auto; margin-right: auto"/>
                    </div>

                    <div class="form-group row">
                        <label for="favicon" class="col-form-label col-md-2">Favicon</label>
                        <input class="form-control col-md-6" id="favicon" type="file" name="favicon">
                        <img id="favicon_preview" alt="Favicon Preview" class="col-md-2"
                             src="{{('logo')}}/{{$siteIdentity->favicon}}"
                             style="display: block; margin-left: auto; margin-right: auto"/>
                    </div>

                    <div class="form-group row">
                        <label for="version" class="col-md-2 col-form-label">Version</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="version" name="version"
                                   value="{{ $siteIdentity->version }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="facebook" class="col-md-2 col-form-label">Facebook</label>
                        <div class="col-md-10">
                            <input type="url" class="form-control" id="facebook" name="facebook"
                                   value="{{ $siteIdentity->facebook }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="twitter" class="col-md-2 col-form-label">Twitter</label>
                        <div class="col-md-10">
                            <input type="url" class="form-control" id="twitter" name="twitter"
                                   value="{{ $siteIdentity->twitter }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="instagram" class="col-md-2 col-form-label">Instagram</label>
                        <div class="col-md-10">
                            <input type="url" class="form-control" id="instagram" name="instagram"
                                   value="{{ $siteIdentity->instagram }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="youtube" class="col-md-2 col-form-label">Youtube</label>
                        <div class="col-md-10">
                            <input type="url" class="form-control" id="youtube" name="youtube"
                                   value="{{ $siteIdentity->youtube }}">
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
