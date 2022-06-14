<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Faixa;

class AlbumController extends Controller
{
    public function listAlbum(Request $request){
        
        //Retornando apenas os albums do filtro
        if($request->pesquisa){

            $albums = Album::where('name','like',$request->pesquisa)->get();
            
            return view('home',['albums' => $albums]);
        }
        //Retornando todos os albums
        else{
            $albums = Album::all();

            return view('home',['albums' => $albums]);
        }

    }

    public function CreateAlbum(Request $request){

        $albums = new Album;

        $albums->name = $request->name;
        $albums->DataLancamento = $request->DataLancamento;

        $albums->save();

        return redirect('/');
    }

    public function DeleteAlbum($id){

        Album::findOrFail($id)->delete();

        return redirect('/');
    }

}
