<?php

namespace App\Livewire\HomeSlider;

use App\Models\HomeSlider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeSliderCreate extends Component
{
    use WithFileUploads;

    public $sliders, $name, $description, $image;
    public $imageName;

    // Validation Rules
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'image' => 'required'
    ];

    public function updatedImage()
    {
        $this->imageName = $this->image->getClientOriginalName();
    }

    public function store()
    {
        // Validate Form Request
        $this->validate();

        $imageName = 'sliders ' . '-' . time() . '-' . $this->image->getClientOriginalName();
        $location = ('images/sliders');
        if (!File::exists($location)) {
            File::makeDirectory($location, 0777, true, true);
        }
        $img = Image::make($this->image->getRealPath());
//            $img->orientate();
        $img->resize(1200, 800, function ($constraint) {
            $constraint->aspectRatio();
        })->save($location . '/' . $imageName);

        HomeSlider::create([
            'name' => $this->name,
            'description' => $this->description,
            'image' => $imageName
        ]);

        return redirect()->to('/getHomeSlider');
    }

    public function render()
    {
        return view('livewire.home-slider.home-slider-create');
    }
}
