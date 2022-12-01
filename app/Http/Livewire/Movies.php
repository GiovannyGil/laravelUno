<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Movie;

class Movies extends Component
{
    public $movies;
    public function render()
    {
        $this->movies = Movie::all();
        return view('livewire.movies');
    }
}
