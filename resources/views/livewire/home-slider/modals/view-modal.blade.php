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
