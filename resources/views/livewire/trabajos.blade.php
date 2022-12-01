<x-slot name="header">
    <center><h1 class="text-gray-900">GESTION DE TRABAJOS</h1></center> 
 </x-slot>    
 <div class="py-12">
     <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
 
             <button wire:click="crear()" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 my3 rounded-md " >ADD</button><br>
             
             @if($modal)
                 @include('livewire.crearT')
             @endif    
             <br>
 
 <table  class="table-fixed w-full">
     <thead>
         <tr class="bg-blue-600 text-white">
             <th class="px-4 py-2">ID</th>
				<th class="px-4 py-2">nombre</th>
				<th class="px-4 py-2">salario</th>
				<th class="px-4 py-2">demanda</th>
				<th class="px-4 py-2">oferta</th>
				<th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach($trabajos as $trabajo)
            
            <tr>
                <td class="border px-4 py-2"><span class="inline-block w-1/3 md:hidden font-bold">id</span>{{$trabajo->id}}</td>
                <td class="border px-4 py-2"><span class="inline-block w-1/3 md:hidden font-bold">nombre</span>{{$trabajo->Nombre}}</td>
                <td class="border px-4 py-2"><span class="inline-block w-1/3 md:hidden font-bold">salario</span>{{$trabajo->Salario}}</td>
                <td class="border px-4 py-2"><span class="inline-block w-1/3 md:hidden font-bold">demanda</span>{{$trabajo->Demanda}}</td>
                <td class="border px-4 py-2"><span class="inline-block w-1/3 md:hidden font-bold">oferta</span>{{$trabajo->Oferta}}</td>
                <td class="border px-4 py-2 text-center">
                    <button wire:click="editar({{$trabajo->id}})"class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4  my3 rounded-md">Edit</button>
                    <button wire:click="borrar({{$trabajo->id}})"class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4  my3 rounded-md">Delete</button>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
