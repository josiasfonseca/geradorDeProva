<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use Illuminate\Http\Request;

class PerguntasController extends Controller
{
    public function store(Request $request) {
        try {
            $pergunta = new Pergunta();
            $respostas = '[]';
            $respostas = json_decode($respostas);
            $tipo = 1;
            if (isset($request->pergunta1)){
                $respostas[0]['name'] = $request->pergunta1;
                if ($request->correta == 1){
                    $respostas[0]['value'] = true;
                }else{
                    $respostas[0]['value'] = false;
                }
                if (isset($request->pergunta2)){
                    $respostas[1]['name'] = $request->pergunta2;
                    if ($request->correta == 2){
                        $respostas[1]['value'] = true;
                    }else{
                        $respostas[1]['value'] = false;
                    }
                    if (isset($request->pergunta3)){
                        $respostas[2]['name'] = $request->pergunta3;
                        if ($request->correta == 3){
                            $respostas[2]['value'] = true;
                        }else{
                            $respostas[2]['value'] = false;
                        }
                        if (isset($request->pergunta4)){
                            $respostas[3]['name'] = $request->pergunta4;
                            if ($request->correta == 4){
                                $respostas[3]['value'] = true;
                            }else{
                                $respostas[3]['value'] = false;
                            }

                        }
                    }
                }
            }else{
                $tipo = 2;
            }

            $pergunta->pergunta = $request->pergunta;
            $pergunta->dificuldade = $request->nivel;
            $pergunta->respostas = json_encode($respostas);
            $pergunta->rotulo = $request->rotulo;
            $pergunta->tipo_pergunta = $tipo;
            $pergunta->save();
            return view('welcome');
        }catch (\Exception $e) {
            return view('perguntas');
        }
    }


}
