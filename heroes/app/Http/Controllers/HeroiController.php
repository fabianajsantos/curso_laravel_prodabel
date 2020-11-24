<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Heroi;

class HeroiController extends Controller
{
    //

    public function index(Request $request)
    {
        try {
            $request->validate([
                'id'   => 'nullable|numeric',
                'nome' => 'nullable|alpha'
            ]);

            if($request->isMethod("GET")) {
                if($request->id) {
                    $herois = Heroi::where('id', $request->id)->get();
                } else {
                    $herois = Heroi::get();
                }
            } else if($request->isMethod("POST")) {
                if($request->id) {
                    Heroi::where('id', $request->id)->delete();
                }
                $nome = "%".($request->nome)."%";
                $herois = Heroi::where('nome', 'like', $nome)->get();
            }

        } catch(\Exception $e) {
            dd($e->getMessage());
        }

        return view("herois.index", ['herois' => $herois]);
    }

    public function save(Request $request)
    {

        if($request->id) {
            //busca heroi para update
            $heroi = Heroi::find($request->id);
        } else {
            //cria heroi para insert
            $heroi = new Heroi();
        }

        if($request->isMethod('GET')) {

        } else if($request->isMethod('POST')) {
            $heroi->nome      = $request->nome;
            $heroi->sexo      = $request->sexo;
            $heroi->terraqueo = $request->terraqueo == 'on' ? 'S' : 'N';
            $heroi->planeta   = $request->planeta;
            $heroi->pais      = $request->pais;
            $heroi->save();

            return redirect('/herois/save?id='.$heroi->id);
        }
        return view('herois.save', ['heroi' => $heroi]);

    }

    public function teste()
    {
        dd('vai Polonia!');
    }
}
