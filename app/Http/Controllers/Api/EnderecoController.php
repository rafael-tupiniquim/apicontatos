<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Endereco;

class EnderecoController extends Controller
{
    public function statusend(){
        return ['statusend' => 'ok'];
    }

    public function add2(Request $request) {
        try {
            $endereco = new Endereco();
            
            $endereco->logradouro = $request->logradouro;
            $endereco->numero = $request->numero;
            $endereco->bairro = $request->bairro;
            $endereco->cidade = $request->cidade;
            $endereco->estado = $request->estado;
            $endereco->cep = $request->cep;

            $endereco->save();

            return ['retorno'=>'ok'];


        } catch(\Exception $erro) {

            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function list2() {

        $endereco = Endereco::all('id', 'logradouro');

        return $endereco;
    }

    public function select2($id) {

        $endereco = Endereco::find($id);

        return $endereco;
    }

    public function update2(Request $request, $id) {

        try {

            $endereco = Endereco::find($id);

            $endereco->logradouro = $request->logradouro;
            $endereco->numero = $request->numero;
            $endereco->bairro = $request->bairro;
            $endereco->cidade = $request->cidade;
            $endereco->estado = $request->estado;
            $endereco->cep = $request->cep;

            $endereco->save();

            return ['retorno'=>'ok', 'data'=>$request->all()];



        } catch(\Exception $erro) {

            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }


    public function delete2($id) {

        try {

            $endereco = Endereco::find($id);

            $endereco -> delete();

            return ['retorno'=>'ok'];



        } catch(\Exception $erro) {

            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }



}
