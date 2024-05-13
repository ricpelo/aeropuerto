<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Vuelos disponibles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Código
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Origen
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Destino
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Compañía
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Salida
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Llegada
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Precio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Plazas libres
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Reservar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vuelos as $vuelo)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $vuelo->codigo }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $vuelo->origen->nombre }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $vuelo->destino->nombre }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $vuelo->compania->nombre }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $vuelo->salida }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $vuelo->llegada }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $vuelo->precio }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $vuelo->cantidadPlazasLibres() }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" class="ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1.5 me-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                <a href="{{ route('reservas.create', $vuelo) }}">
                                                    Seleccionar
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
