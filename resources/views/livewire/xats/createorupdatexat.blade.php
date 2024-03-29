<div class="bg-gray-200 h-screen">
    <div class="container mx-auto py-20">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 bg-gray-50 p-4 shadow-lg max-w-2xl mt-20">
            <div class="heading text-center font-bold text-2xl m-5 text-gray-700">Modificar Xat</div>
            <form wire:submit.prevent="{{ $isCreation ? 'create' : 'update' }}" class="space-y-4">
                <div>
                    <label for="nom" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Nom:</label>
                    <input type="text" id="nom" wire:model="nom" class="text-gray-700 text-sm font-bold rounded-md title bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" spellcheck="false" placeholder="Introdueix el nom..." required>
                    @error('nom') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="descripcio" class="text-gray-700 text-sm font-bold block mb-2">Descripció:</label>
                    <textarea id="descripcio" wire:model="descripcio" class="text-gray-700 text-sm font-bold description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none w-full" spellcheck="false" placeholder="Descriu el xat..." required></textarea>
                    @error('descripcio') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="url" class="text-gray-700 text-sm font-bold block mb-2">URL:</label>
                    <input type="text" id="url" wire:model="url" class="text-gray-700 text-sm font-bold rounded-md bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" placeholder="URL del xat..." required>
                    @error('url') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="password" class="text-gray-700 text-sm font-bold block mb-2">Contraseña:</label>
                    <input type="password" id="password" wire:model="password" class="text-gray-700 text-sm font-bold rounded-md bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" placeholder="Contraseña del xat..." required>
                    @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="foto" class="text-gray-700 text-sm font-bold block mb-2">Foto:</label>
                    <input type="text" id="foto" wire:model="foto" class="text-gray-700 text-sm font-bold rounded-md bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" spellcheck="false" placeholder="URL de la foto..." required>
                    @error('foto') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="tipus" class="text-gray-700 text-sm font-bold block mb-2">Tipus:</label>
                    <select id="tipus" wire:model="tipus" class="text-gray-700 text-sm font-bold rounded-md bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" required>
                        <option value="">Selecciona una opció...</option>
                        <option value="general">General</option>
                        <option value="privat">Privat</option>
                        <!-- Añade más opciones según sea necesario -->
                    </select>
                    @error('tipus') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="privacitat" class="text-gray-700 text-sm font-bold block mb-2">Privacitat:</label>
                    <select id="privacitat" wire:model="privacitat" class="text-gray-700 text-sm font-bold rounded-md bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" required>
                        <option value="">Selecciona una opció...</option>
                        <option value="pública">Pública</option>
                        <option value="privada">Privada</option>
                        <!-- Añade más opciones según sea necesario -->
                    </select>
                    @error('privacitat') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="idioma" class="text-gray-700 text-sm font-bold block mb-2">Idioma:</label>
                    <select id="idioma" wire:model="idioma" class="text-gray-700 text-sm font-bold rounded-md bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" required>
                        <option value="">Selecciona una opció...</option>
                        <option value="Catala">Català</option>
                        <option value="Espanol">Español</option>
                        <option value="English">English</option>
                        <!-- Añade más opciones según sea necesario -->
                    </select>
                    @error('idioma') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <!-- Campos adicionales aquí -->

                <div class="flex justify-between">
                    <button type="submit" class="w-1/2 bg-blue-500 text-white p-3 rounded-md">Guardar</button>
                    <button wire:click="resetForm" class="w-1/2 bg-red-500 text-white p-3 rounded-md">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
