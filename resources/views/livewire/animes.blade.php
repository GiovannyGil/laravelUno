<x-slot name="header">
    <center><h1 class="text-gray-900">GESTION DE ANIMES</h1></center> 
 </x-slot>    
 <div class="py-12">
     <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
 
             <button wire:click="crear()" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 my3 rounded-md " >ADD</button><br>
             
             @if($modal)
                 @include('livewire.crearA')
             @endif 
             @if($modalE)
                @include('livewire.EditA')
            @endif   
             <br>
 
 
    <table class="table-fixed w-full">
        <thead>
        <tr class="bg-blue-600 text-white">
                <th class="px-4 py-2">id</th>
				<th class="px-4 py-2">nombre</th>
				<th class="px-4 py-2">genero</th>
				<th class="px-4 py-2">categoria</th>
				<th class="px-4 py-2">temporadas</th>
				<th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animes as $anime)
            
            <tr>
                <td class="border px-4 py2"><span class="inline-block w-1/3 md:hidden font-bold">id</span>{{$anime->id}}</td>
                <td class="border px-4 py2"><span class="inline-block w-1/3 md:hidden font-bold">nombre</span>{{$anime->Nombre}}</td>
                <td class="border px-4 py2"><span class="inline-block w-1/3 md:hidden font-bold">genero</span>{{$anime->Genero}}</td>
                <td class="border px-4 py2"><span class="inline-block w-1/3 md:hidden font-bold">categoria</span>{{$anime->Categoria}}</td>
                <td class="border px-4 py2"><span class="inline-block w-1/3 md:hidden font-bold">temporadas</span>{{$anime->Temporadas}}</td>
                <td class="border px-4 py-2 text-center">
                    <button wire:click="editar({{$anime->id}})"class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4  my3 rounded-md">Edit</button>
                    <button wire:click="borrar({{$anime->id}})"class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4  my3 rounded-md">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
