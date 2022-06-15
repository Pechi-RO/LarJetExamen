<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MOSTRAR Comics') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="flex mx-auto my-auto">
   
            
<div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div>
    <img class="rounded-t-lg" src="{{Storage::url($comic->image)}}" alt="">
    
    <div class="p-5">
    
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$comic->nombre}}</h5>
    
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Privado:{{$comic->privado}}</p>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Editorial: {{$comic->editorial}}</p>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Categoria: {{$comic->category->nombre}}</p>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Autor: {{$comic->user->name}}</p>

    </div>
    
    </div>
    <a href="{{route('comics.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-home"></i>Inicio</a>
    </div>
    
        </div>

    </x-slot>


</x-app-layout>