<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\inventario;

class Inventarios extends Component
{
    public $inventarios,$Nombre,$cantidad,$subtotal,$total;
    public $modal=false; //cerrar modal
    public $modalE =false;//cierre modal de edicion

    public function render()
    {
        $this->inventarios = inventario::all();
        return view('livewire.inventarios');
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
        $this->cantidad ='';
        $this->subtotal ='';
        $this->total ='';
    } 
    
        //boton editar
        public function editar($id){//llamamos los datos con el id
            $inventarios = inventario::findOrFail($id);//metodo para llamar el modal y finalizar
            $this-> id_inventario = $id;
            $this->Nombre = $inventarios->Nombre;
            $this->cantidad = $inventarios->cantidad;
            $this->subtotal = $inventarios->subtotal;
            $this->total = $inventarios->total;
            $this->abrirModalE();
        } 

        public function update(){
            $this->validate(['Nombre'=>'required','cantidad'=>'required','subtotal'=>'required','total'=>'required']);
            if ($this->id) {
                $inventarios = inventario::find($this->id_inventario);
                $inventarios->update([
                    'Nombre' =>$this->Nombre,
                    'catidad' =>$this->cantidad,
                    'subtotal' =>$this->subtotal,
                    'total' =>$this->total
                ]);
            }
            $this->cerrarModalE();
            $this->limpiar();
        }
    
        public function borrar($id){//se llama el id
            inventario::find($id)->delete();//elimina el registro de la tabla
        } 
    
        public function guardar(){
            inventario::updateOrCreate(['id'=>$this->id],
            [
                'Nombre' =>$this->Nombre,
                'cantidad' =>$this->cantidad,
                'subtotal' =>$this->subtotal,
                'total'=>$this->total,           
            ]);
            $this->cerrarModal();
            $this->limpiar();
        }

}
