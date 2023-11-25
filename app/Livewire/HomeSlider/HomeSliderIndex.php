<?php

namespace App\Livewire\HomeSlider;

use App\Models\HomeSlider;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class HomeSliderIndex extends Component
{
    public $sliders;

    public function mount()
    {
        $this->sliders = HomeSlider::all();
    }

    public function render(): View|Application
    {
        return view('livewire.home-slider.home-slider-index');
    }

    public function edit($id){
        $slider = HomeSlider::findOrFail($id);
        $this->name = $slider->name;
        $this->description = $slider->description;
        $this->image = $slider->image;
        $this->updateSlider = true;
    }

    public function update()
    {

    }

    public function deleteSlider($sliderId)
    {
        HomeSlider::find($sliderId)->delete();
        $this->sliders = HomeSlider::all(); // Refresh the list after deletion
        $this->dispatch('closeDeleteModal');
    }
}
