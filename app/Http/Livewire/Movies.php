<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Movie;

class Movies extends Component
{
    public $Nombre,$Genero,$Protagonista;
    public $modal=false; //cerrar modal
    public $movies;
    public function render()
    {
        $this->movies = Movie::all();
        return view('livewire.movies');
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
        $this->Protagonista ='';
    } 
    
        //boton editar
        public function editar($id){//llamamos los datos con el id
            $movies = Movie::findOrFail($id);//metodo para llamar el modal y finalizar
            $this-> id_movie = $id;
            $this->Nombre = $movies->Nombre;
            $this->Genero = $movies->Genero;
            $this->Protagonista = $movies->Protagonista;
            $this->abrirModal();
        } 

        public function update(){
            $this->validate(['Nombre'=>'required','Genero'=>'required','Protagonista'=>'required']);
            if ($this->id) {
                $movies = Movie::find($this->id_movie);
                $movies->update([
                    'Nombre' =>$this->Nombre,
                    'Genero' =>$this->Genero,
                    'Protagonista' =>$this->Protagonista   
                ]);
            }
            $this->cerrarModal();
            $this->limpiar();
        }
    
        public function borrar($id){//se llama el id
            Movie::find($id)->delete();//elimina el registro de la tabla
        } 
    
        public function guardar(){
            Movie::updateOrCreate(['id'=>$this->id],
            [
                'Nombre' =>$this->Nombre,
                'Genero' =>$this->Genero,
                'Protagonista' =>$this->Protagonista            
            ]);
            $this->cerrarModal();
            $this->limpiar();
        }

}
