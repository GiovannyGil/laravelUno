<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\trabajo;

class Trabajos extends Component
{
    public $Nombre,$Salario,$Demanda,$Oferta;
    public $modal=false; //cerrar modal
    public $modalE =false;//cierre modal de edicion
    public function render()
    {
        $this->trabajos = trabajo::all();
        return view('livewire.trabajos');
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
        $this->Salario ='';
        $this->Demanda ='';
        $this->Oferta ='';
    } 
    
    public function abrirModalE(){//al darle clic se abre el modal de edicion
        $this->modalE = true;
    }
    public function cerrarModalE(){//al darle click se cierra el modal de edicion
        $this->modalE = false;
    }

        //boton editar
        public function editar($id){//llamamos los datos con el id
            $trabajos = trabajo::findOrFail($id);//metodo para llamar el modal y finalizar
            $this-> id_trabajo = $id;
            $this->Nombre = $trabajos->Nombre;
            $this->Salario = $trabajos->Salario;
            $this->Demanda = $trabajos->Demanda;
            $this->Oferta = $trabajos->Oferta;
            $this->abrirModalE();
        } 

        public function update(){
            $this->validate(['Nombre'=>'required','Salario'=>'required','Demanda'=>'required','Oferta'=>'required']);
            if ($this->id) {
                $trabajos = trabajo::find($this->id_trabajo);
                $trabajos->update([
                    'Nombre' =>$this->Nombre,
                    'Salario' =>$this->Salario,
                    'Demanda' =>$this->Demanda,
                    'Oferta' =>$this->Oferta 
                ]);
            }
            $this->cerrarModalE();
            $this->limpiar();
        }
    
        public function borrar($id){//se llama el id
            trabajo::find($id)->delete();//elimina el registro de la tabla
        } 
    
        public function guardar(){
            trabajo::updateOrCreate(['id'=>$this->id],
            [
                'Nombre' =>$this->Nombre,
                'Salario' =>$this->Salario,
                'Demanda' =>$this->Demanda,
                'Oferta' =>$this->Oferta             
            ]);
            $this->cerrarModal();
            $this->limpiar();
        }
}
