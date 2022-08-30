<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "aqui se va a mostrar todos los bootcamp";
        return response()->json(["succes"=> true,
                                "data"=>Bootcamp::all()
                                ], 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verificar que llego aqui el payload
        $b = Bootcamp::create([
            "name" => $request->name,
            "description" => $request->description,
            "website" => $request->website,
            "phone" => $request->phone,
            "user_id" => $request->user_id
        ]);
        return response()->json(["succes"=> true,
        "data"=>$b
        ], 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo "mostrar un bootcamp cuyo id es: $id";
        return response()->json(["succes"=> true,
        "data"=>Bootcamp::find($id)
        ], 200 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //seleccionar el bootcamp por id
        //actualizar
        //hacer el response respectivo
        $bootcamp = Bootcamp::find($id);
        $bootcamp->update(
              $request->all()
        );

        return response()->json(["succes"=> true,
                                "data" => $bootcamp], 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //seleccionar el bootcamp
        //eliminar el bootcamp
        $bootcamp = Bootcamp::find($id);
        $bootcamp->delete();
        return response()->json(["succes"=> true,
                                "message" => "Bootcamp eliminado",
                                "data"=>Bootcamp::find($id)],200);
    }
}
