<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function consultar(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string'
        ]);

        $cpf = $request->cpf;
        $data = [

            'cpf' => $cpf

        ];
        // Simulação de ofertas disponíveis
        $url = "https://dev.gosat.org/api/v1/simulacao/credito";
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response  = json_decode(curl_exec($ch));
        curl_close($ch);
        return $response;
    }
    public function consultar2(Request $request){

        $cpf = $request->cpf;
        $instituicao_id = $request->id;
        $codModalidade = $request->mod;

         $data = [
            'cpf' => $cpf,
            'instituicao_id' => $instituicao_id,
            'codModalidade' => $codModalidade
        ];       
        
        // Simulação de ofertas disponíveis
        $url = "https://dev.gosat.org/api/v1/simulacao/oferta";
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response  = json_decode(curl_exec($ch));
        Consulta::create([
            'cpf' => $cpf,
            'instituicaoFinanceira' => $instituicao_id,
            'modalidadeCredito' => $codModalidade,
            'qtdeParcelaMinima' => $response->QntParcelaMin,
            'qtdeParcelaMaxima' => $response->QntParcelaMax,
            'valorMin' => $response->valorMin,
            'valorMax' => $response->valorMax,
            'taxaJuros' => $response->jurosMes,
        ]);
        $response->valorMin = number_format($response->valorMin, 2, ',', '.');
        $response->valorMax = number_format($response->valorMax, 2, ',', '.');
        curl_close($ch);
        return $response;
    }

    public function listarConsultas()
    {
        $consultas = Consulta::orderBy('created_at', 'desc')->get();
        return view('consultas', compact('consultas'));
    }
    
}
