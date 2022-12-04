<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Game;

class Games extends Component
{
public $Nombre,$Genero,$Categoria;
public $modal=false; //cerrar modal
public $modalE =false;//cierre modal de edicion

    
    public function render()
    {
        $this->games = Game::all();
        return view('livewire.games');
    }

    public function crear()//para el boton crear
    {
        $this->limpiar();//limpiar el modal
        $this->abrirModal();//abril el modal
    }

    public function abrirModal(){//al darle clic se abre el modal
        $this->modal = true;
    }
    public function cerrarModal(){//al darle click se cierra el modal
        $this->modal = false;
    }
    public function abrirModalE(){//al darle clic se abre el modal de edicion
        $this->modalE = true;
    }
    public function cerrarModalE(){//al darle click se cierra el modal de edicion
        $this->modalE = false;
    }

    public function limpiar(){//limpiar los datos de la tabla
        $this->id ='';
        $this->Nombre ='';
        $this->Genero ='';
        $this->Categoria ='';
    } 
    
        //boton editar
        public function editar($id){//llamamos los datos con el id
            $games = Game::findOrFail($id);//metodo para llamar el modal y finalizar
            $this-> id_game = $id;
            $this->Nombre = $games->Nombre;
            $this->Genero = $games->Genero;
            $this->Categoria = $games->Categoria;
            $this->abrirModalE();
        } 

        public function update(){
            $this->validate(['Nombre'=>'required','Genero'=>'required','Categoria'=>'required']);
            if ($this->id) {
                $games = Game::find($this->id_game);
                $games->update([
                    'Nombre' =>$this->Nombre,
                    'Genero' =>$this->Genero,
                    'Categoria' =>$this->Categoria   
                ]);
            }
            $this->cerrarModalE();
            $this->limpiar();
        }
    
        public function borrar($id){//se llama el id
            Game::find($id)->delete();//elimina el registro de la tabla
        } 
    
        public function guardar(){
            Game::updateOrCreate(['id'=>$this->id],
            [
                'Nombre' =>$this->Nombre,
                'Genero' =>$this->Genero,
                'Categoria' =>$this->Categoria            
            ]);
            $this->cerrarModal();
            $this->limpiar();
        }

}
