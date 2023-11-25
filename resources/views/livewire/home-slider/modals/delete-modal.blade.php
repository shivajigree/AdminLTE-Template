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
                <form wire:submit.prevent="deleteSlider({{ $slider->id }})">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
