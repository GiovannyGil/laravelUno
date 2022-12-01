<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\anime;

class Animes extends Component
{
    public $animes;
    public function render()
    {
        $this->animes = anime::all();
        return view('livewire.animes');
    }
}
