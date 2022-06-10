<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faixa;


class FaixaController extends Controller
{


    public function listFaixa(){

        $Faixa = Faixa::all();

        return view('home',['Faixas' => $Faixa]);
    }

    public function CreateFaixa(Request $request){

        $faixa = new Faixa;

        $faixa->name = $request->name;
        $faixa->numero = $request->numero;
        $faixa->duracao = $request->duracao;
        $faixa->album_id = $request->album_id;
              
        $faixa->save();

        return redirect('/');
    }

    public function DeleteFaixa($id){

        Faixa::findOrFail($id)->delete();

        return redirect('/');
    }
}
