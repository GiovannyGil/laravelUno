

<button wire:click="crear()" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Agregar</button> 

@if($modal)
  @include("livewire.AgregarG()")
@endif
<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">id</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">nombre</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">genero</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">categoria</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach($games as $game)
            
            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span>{{$game->id}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">nombre</span>{{$game->Nombre}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">genero</span>{{$game->Genero}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">categoria</span>{{$game->Categoria}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
					<span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
					<button wire:click="editar({{$game->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Edit</button>
					<button wire:click="borrar({{$game->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
