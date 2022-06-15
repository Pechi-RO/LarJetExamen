<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CATEGORIAS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
   
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
    <th scope="col" class="px-6 py-3">
    Nombre
    </th>
    <th scope="col" class="px-6 py-3">
    Descripcion
    </th>
    
    </tr>
    </thead>
    <tbody>
        @foreach($category as $item)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
     
    {{$item->nombre}}
    </th>
    <td class="px-6 py-4">
    {{$item->descripcion}}
    </td>
    
    </tr>
    @endforeach
    </tbody>
    
    </table>
    </div>
    
            </div>
        </div>
    </div>
</x-app-layout>
