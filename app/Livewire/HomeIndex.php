<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class HomeIndex extends Component
{
    #[Title('Home')]

    public $title = 'Dashboards';

    public function render()
    {
        return view('livewire.home-index')->layout('admin.layouts.master');
    }
}
