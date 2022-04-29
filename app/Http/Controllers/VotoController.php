<?php

namespace App\Http\Controllers;

use App\Models\Voto;
use Illuminate\Http\Request;
use App\Http\Requests\VotoCreateRequest;

class VotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JSONResponse
     */
    public function index()
    {
        $votos = Voto::all();

        $response = [
            'votos' => $votos,
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JSONResponse
     */
    public function store(VotoCreateRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = $request->user()->id;

        $verificaVoto = Voto::where('user_id', $data['user_id'])->first();
        if ($verificaVoto) {
            $response = [
                'message' => 'Este usuário já votou anteriormente',
            ];
            return response()->json($response, 406);
        }
        $voto = Voto::create($data);

        if ($voto) {
            $response = [
                'message' => 'voto cadastrado com sucesso',
                'voto' => $voto,
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'houve um erro no cadastro do voto',
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JSONResponse
     */
    public function show(int $voto)
    {
        $voto = Voto::find($voto);
        if ($voto) {
            $response = [
                'voto' => $voto,
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'O voto não foi encontrado no sistema',
            ];
            return response()->json($response, 404);
        }
    }
}
