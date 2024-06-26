
<div class="antialiased bg-gray-200 pb-32 pt-12 px-6">

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

    <div class="container mx-auto py-6 px-4">
        <h1 class="text-3xl py-4 border-b mb-10 tracking-wide">Gèneres</h1>

        <div class="mb-4 flex grid-rows gap-x-2 justify-end">
            @if (empty($selectedRows))
                <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center
            text-sm font-semibold text-white shadow-sm hover:bg-indigo-500
            focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
            focus-visible:outline-indigo-600" style="outline: none" wire:click="cridaCreate">Crear</button>
            @endif
            @if (!empty($selectedRows))
                <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center
            text-sm font-semibold text-white shadow-sm hover:bg-indigo-500
            focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
            focus-visible:outline-indigo-600" style="outline: none" wire:click="delete">Borrar</button>
            @endif
            @if (count($selectedRows) === 1)
                <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center
            text-sm font-semibold text-white shadow-sm hover:bg-indigo-500
            focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
            focus-visible:outline-indigo-600" style="outline: none" wire:click="cridaUpdate({{ $selectedRows[0] }})">Modificar</button>
            @endif

        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative"
             style="height: 405px;">
            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                <thead>
                <tr class="text-left">
                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                        <input type="checkbox" class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline rounded" wire:click="selectAll">
                    </th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">Genere ID</th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">Name</th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">Description</th>
                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">Data creació</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($generes as $genere)
                    <tr class="hover:bg-gray-50">
                        <td class="border-dashed border-t border-gray-200 px-3">
                            <input type="checkbox" class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline rounded" wire:model.live="selectedRows" value="{{ $genere->id }}">
                        </td>
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">{{ $genere->id }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">{{ $genere->name }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">{{ $genere->description }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center text-sm">{{ $genere->created_at }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

