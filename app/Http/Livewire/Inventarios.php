<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\inventario;

class Inventarios extends Component
{
    public $inventarios;
    public function render()
    {
        $this->inventarios = inventario::all();
        return view('livewire.inventarios');
    }
}
