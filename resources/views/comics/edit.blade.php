<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ACTUALIZAR Comics') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="flex mx-auto my-auto">
        <form action="{{route('comics.update',$comic)}}" name="c" method="POST"  enctype="multipart/form-data">
            @METHOD('PUT')
            @csrf
            
            <div class="flex">
            <x-jet-label value="nombre"></x-jet-label>
            <x-jet-input name="nombre" value="{{$comic->nombre}}"></x-jet-input>
            @error('nombre')
            <br>
            <p class="text-red-800">{{$message}}</p>
            @enderror
        </div>
       

        <div class="flex">
            <x-jet-label>Privado:</x-jet-label>
            <br>
            <x-jet-label>SI</x-jet-label>
            @if($comic->privado=="SI")
            <x-jet-input type="radio" name="privado" value="1" checked></x-jet-input>
            @else
            <x-jet-input type="radio" name="privado" value="1"></x-jet-input>
            @endif

            <x-jet-label>NO</x-jet-label>
            @if($comic->privado=="NO")
            <x-jet-input type="radio" name="privado" value="2" checked></x-jet-input>
            @else
            <x-jet-input type="radio" name="privado" value="2"></x-jet-input>
            @endif

            @error('privado')
            <br>
            <p class="text-red-800">{{$message}}</p>
            @enderror
        </div>

        <div class="flex">
            <x-jet-label>Imagen:</x-jet-label>
            <input type="file" name="image"  accept="image/*" id="image" >
            <img src="{{Storage::url($comic->image)}}" class="bg-cover bg-center" id="img">

            @error('image')
            <br>
            <p class="text-red-800">{{$message}}</p>
            @enderror

        </div>

        <div class="flex mt-2 mb-2">
            <x-jet-label>Editorial:</x-jet-label>
            <select name="editorial">

            @foreach ($editorial as $item)
                @if($item==$comic->editorial)
                <option class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{$item}}" selected>{{$item}}</option>
                @else
                <option class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{$item}}">{{$item}}</option>
                @endif

            @endforeach
            @error('editorial')
            <br>
            <p class="text-red-800">{{$message}}</p>
            @enderror
        </select>

        </div>

        <div class="flex mt-2 mb-2">
            <x-jet-label>Categoria:</x-jet-label>
            <select name="category_id">

            @foreach ($category as $item)
                @if($item->nombre==$comic->category->nombre)
                <option class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{$item->id}}" selected>{{$item->nombre}}</option>
                @else
                <option class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{$item->id}}">{{$item->nombre}}</option>
                @endif


            @endforeach
        </select>
    
        <input type="text" hidden value="{{Auth::id()}}" name="user_id">

    
        </div>
    
        <x-jet-button type="submit" ><i class="fas fa-edit"></i>Actualizar</x-jet-button>
        <x-jet-button type="clear" ><i class="fas fa-broom"></i>Reset</x-jet-button>

        </form>
    </div>

    <script>
        //Cambiar imagen
        document.getElementById("image").addEventListener('change', cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload=(event)=>{
                document.getElementById("img").setAttribute('src', event.target.result)
            };
            reader.readAsDataURL(file);
        }
    </script>


    </x-slot>


</x-app-layout>