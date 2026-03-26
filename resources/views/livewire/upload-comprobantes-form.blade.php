<div>
    <form method="POST" wire:submit.prevent="login" class="w-full">
        @csrf
        <div class="mb-4">
            <label for="N° de Comprobante" class="block text-sm font-medium text-gray-700 dark:text-gray-300">N° de Comprobante</label>
            <input id="N° de Comprobante" type="text" name="N° de Comprobante" required autofocus class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
        </div>

        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre del cliente que realizó la compra</label>
            <input id="nombre" type="text" name="text" required class="uppercase mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
        </div>

        <div class="mb-6">
            <label for="banco" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Banco</label>
            <select id="banco" name="banco" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="">Selecciona el banco</option>
                <option value="Pichincha">Banco Pichincha</option>
                <option value="Produbanco">Produbanco</option>
                <option value="Bolivariano">Banco Bolivariano</option>
                <option value="Pacifico">Banco Pacifico</option>
                <option value="Cooperativa">Cooperativa</option>
                <option value="otro">Otro</option>
            </select>
        </div>

        <div class="mb-6">
            <label class="relative cursor-pointer bg-red-600 text-white p-4 hover:bg-blue-800 font-semibold py-2 px-4 rounded-lg transition duration-200 shadow-md">
                <span>Seleccionar comprobante</span>
                <input type="file" wire:model="dbfFile" class="hidden" accept=".dbf">
            </label>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Registrar</button>
        </div>

    </form>
</div>