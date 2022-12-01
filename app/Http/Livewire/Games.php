<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Game;

class Games extends Component
{
public $games,$Nombre,$Genero,$Categoria;
public $modal=false; //cerrar modal

    
    public function render()
    {
        $this->games = Game::all();
        return view('livewire.games');
    }
}

//     public function crear(){ //crear el modal
//         $this->limpiar(); //limpiar el modal
//         $this->abrirModal(); //abrir el modal
//     }
//     public function abrirModal(){ // al dar click se hace el modal
//         $this->modal=true;
//     }
//     public function cerrarModal(){
//         $this->modal=false;
//     }
//     public function Limpiar(){
//         $this->id='';
//         $this->Nombre='';
//         $this->Genero='';
//         $this->Categoria='';
//     }

//     public function editar($id){
//         $games=Game::findOrFail($id); // metodo para llamar modal y finalizar
//         $this->id=$id;
//         $this->Nombre=$games ->$Nombre;
//         $this->Genero=$games->$Genero;
//         $this->Categoria=$games->$Categoria;
//         $this->abrirModal();
//     }

//     public function borrar($id){ // se llama el id
//         Game::find($id)->delete(); // elimina el registro de la tabla
//     }

// }
