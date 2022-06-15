<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('COMICS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex flex-row-reverse">
        <a href="{{route('comics.create')}}" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-plus"> NUEVO</i></a>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
    <th scope="col" class="px-6 py-3">
    Nombre
    </th>
    <th scope="col" class="px-6 py-3">
    Privado
    </th>
    <th scope="col" class="px-6 py-3">
    Editorial
    </th>
    <th scope="col" class="px-6 py-3">
    Categoria
    </th>
    <th scope="col" class="px-6 py-3">
    <span class="sr-only">Acciones</span>
    </th>
    </tr>
    </thead>
    <tbody>
        @foreach($comics as $item)
        @if($item->user->id==auth()->user()->id)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
        <div class="rounded-full w-auto h-auto" >
    <img src="{{Storage::url($item->image)}}" alt=""width="80" heigth="80">
</div>
    {{$item->nombre}}
    </th>
    <td class="px-6 py-4">
    {{$item->privado}}
    </td>
    <td class="px-6 py-4">
    {{$item->editorial}}
    </td>
    <td class="px-6 py-4">
    {{$item->category->nombre}}
    </td>
    <td class="px-6 py-4 text-right">
    <form action="{{route('comics.destroy',$item)}}" method="POST">
    @csrf
        @METHOD('DELETE')
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-trash"></i>Borrar</button>
</form>
<a href="{{route('comics.edit',$item)}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-broom"></i>Editar</a>
<a href="{{route('comics.show',$item)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="fa fa-eye"></i>Mostrar</a>

</td>
    </tr>
    @endif
    @endforeach
    </tbody>
    
    </table>
    </div>
    
            </div>
        </div>
    </div>
</x-app-layout>
