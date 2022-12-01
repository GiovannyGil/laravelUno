<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\trabajo;

class Trabajos extends Component
{
    public $trabajos;
    public function render()
    {
        $this->trabajos = trabajo::all();
        return view('livewire.trabajos');
    }
}
