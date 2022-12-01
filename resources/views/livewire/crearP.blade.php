<!--creamos modal-->

<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-blok sm:aling-middle sm:hscreen"></span>
        
        <div class="inline-block aling-bottom bg-white rounded-lg text-left overflow.hidden shadow-x1 transform transition-all  sm-my-8 sm:alingn-middle sm:max-w-lg sm:w.full" role="dialog" aria-modal="true" aria-labelledby="modal-eadline">

               
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" class="shadow apparence-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-one focus:shadow-outline" id="nombre" wire:model="nombre">
                </div>

                <div class="mb-4">
                    <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Cantidad:</label>
                    <input type="number" class="shadow apparence-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-one focus:shadow-outline" id="cantidad" wire:model="cantidad">
                </div>
                <div class="mb-4">
                    <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
                    <input type="text" class="shadow apparence-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-one focus:shadow-outline" id="precio" wire:model="precio">
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button wire:click="guardar()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm-text-sm sm:leaning-5">Guardar</button>
                        <button wire:click="update()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm-text-sm sm:leaning-5">Actualizar</button>
                        <button wire:click="cerrarModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm-text-sm sm:leaning-5">Cancelar</button>

                    </span>    
                </div>
                </div>
               </div>
    </div>
</div>