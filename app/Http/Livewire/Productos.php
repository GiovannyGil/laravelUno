<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Productos extends Component
{
    //creamos las variables
public  $nombre, $cantidad, $precio ;

public $modal =false;//cierre modal
public $modalE =false;//cierre modal de edicion

    public function render()
    {
        $this ->productos =Producto::all();
        return view('livewire.productos');
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
        $this->nombre ='';
        $this->cantidad ='';
        $this->precio ='';
    }  
    //boton editar
    public function editar($id){//llamamos los datos con el id
        $producto = Producto::findOrFail($id);//metodo para llamar el modal y finalizar
        $this-> id_producto = $id;
        $this->nombre = $producto->nombre;
        $this->cantidad = $producto->cantidad;
        $this->precio = $producto->precio;
        $this->abrirModalE();
    } 

    public function update(){
        $this->validate(['nombre'=>'required','cantidad'=>'required','precio'=>'required']);
        if ($this->id) {
            $productos = Producto::find($this->id_producto);
            $productos->update([
                'nombre' =>$this->nombre,
                'cantidad' =>$this->cantidad,
                'precio' =>$this->precio   
            ]);
        }
        $this->cerrarModalE();
        $this->limpiar();
    }


    //boton borrar
    public function borrar($id){//se llama el id
        Producto::find($id)->delete();//elimina el registro de la tabla
    } 

    public function guardar(){
        Producto::updateOrCreate(['id'=>$this->id],
        [
            'nombre' =>$this->nombre,
            'cantidad' =>$this->cantidad,
            'precio' =>$this->precio            
        ]);
        $this->cerrarModal();
        $this->limpiar();
    }

}




