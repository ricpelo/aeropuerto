<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reservas
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
                                        Vuelo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Origen
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Destino
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Asiento
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservas as $reserva)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="{{ route('reservas.show', $reserva) }}">
                                                {{ $reserva->vuelo->codigo }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $reserva->vuelo->origen->nombre }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $reserva->vuelo->destino->nombre }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $reserva->asiento }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $reserva->vuelo->salida }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $reserva->vuelo->llegada }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $reserva->vuelo->precio }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" class="ml-4 mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <a href="#">
                        Reservar
                    </a>
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
