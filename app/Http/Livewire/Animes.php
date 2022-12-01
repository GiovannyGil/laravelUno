<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\anime;

class Animes extends Component
{
    public $Nombre,$Genero,$Categoria,$Temporadas;
    public $modal=false; //cerrar modal
    public function render()
    {
        $this->animes = anime::all();
        return view('livewire.animes');
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
    public function limpiar(){//limpiar los datos de la tabla
        $this->id ='';
        $this->Nombre ='';
        $this->Genero ='';
        $this->Categoria ='';
        $this->Temporadas ='';
    } 
    
        //boton editar
        public function editar($id){//llamamos los datos con el id
            $animes = anime::findOrFail($id);//metodo para llamar el modal y finalizar
            $this-> id_anime = $id;
            $this->Nombre = $animes->Nombre;
            $this->Genero = $animes->Genero;
            $this->Categoria = $animes->Categoria;
            $this->Temporadas = $animes->Temporadas;
            $this->abrirModal();
        } 

        public function update(){
            $this->validate(['Nombre'=>'required','Genero'=>'required','Categoria'=>'required','Temporadas'=>'required']);
            if ($this->id) {
                $animes = anime::find($this->id_anime);
                $animes->update([
                    'Nombre' =>$this->Nombre,
                    'Genero' =>$this->Genero,
                    'Categoria' =>$this->Categoria,
                    'Temporadas' =>$this->Temporadas 
                ]);
            }
            $this->cerrarModal();
            $this->limpiar();
        }
    
        public function borrar($id){//se llama el id
            anime::find($id)->delete();//elimina el registro de la tabla
        } 
    
        public function guardar(){
            anime::updateOrCreate(['id'=>$this->id],
            [
                'Nombre' =>$this->Nombre,
                'Genero' =>$this->Genero,
                'Categoria' =>$this->Categoria,
                'Temporadas' =>$this->Temporadas             
            ]);
            $this->cerrarModal();
            $this->limpiar();
        }

}


