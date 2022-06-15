<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(){
        return view('contacto.index');

    }

    public function enviar(Request $request){
         //validacion
         $request->validate([
            'nombre'=>['required','string','min:5'],
            'email'=>['required','email','min:5'],
            'contenido'=>['required','string','min:10']
        ]);
  //Mandamos el mensaje
  $correo =new ContactoMailable($request->all());
  Mail::to('admin@misposts.es')->send($correo);
    //le hemos puesto nombre inicio a la ruta de welcome.blade.php en web.php
//Route::get('/', 'App\Http\Controllers\InicioController@index')->name('inicio');
return redirect()->route('dashboard')->with('info', "Se ha enviado el mensaje");

    }
}
