<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics=Comic::all();
        return view('comics.index',compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        $user=User::all();
        $editorial=['DC','Marvel','Vertigo','Salvat','Planeta'];
        return view('comics.create',compact('category','editorial','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['string','min:3','required','unique:comics,nombre'],
            'privado'=>['required'],
            'editorial'=>['required'],
            'image'=>['image','required','max:2048'],
            'category_id'=>['required'],
            'user_id'=>['required']
        ]);

        $id = Auth::user()->id;
        
        Comic::create([
            'nombre'=>$request->nombre,
            'privado'=>$request->privado,
            'editorial'=>$request->editorial,
            'image'=>$request->image->store('comics'),
            'category_id'=>$request->category_id,
            'user_id'=>$id
        ]);

        return redirect()->route('comics.index')->with('info','Comic creado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show',compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        $category=Category::all();
        $editorial=['DC','Marvel','Vertigo','Salvat','Planeta'];
        return view('comics.edit',compact('comic','editorial','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'nombre'=>['string','min:3','required','unique:comics,nombre,'.$comic->id],
            'privado'=>['required'],
            'editorial'=>['required'],
            'image'=>['image','max:2048'],
            'category_id'=>['required'],
            'user_id'=>['required']

    ]);
 
    $urlimage=$comic->image;

    if($request->image){
        
        Storage::delete($comic->image);
        //ruta de la imagen nueva
        $urlimage=$request->image->store('comics');

    }

    $comic->update([
            'nombre'=>$request->nombre,
            'privado'=>$request->privado,
            'image'=>$urlimage,
            'editorial'=>$request->editorial,
            'category_id'=>$request->category_id,
            'user_id'=>Auth::user()->id
    ]);

    return redirect()->route('comics.index')->with('info','Comic actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('info','comic borrado con exito');
    }

    public function home()
    {
        $comics=Comic::orderBy('id','desc')->paginate(10);
        return view('welcome',compact('comics'));
    }

}
