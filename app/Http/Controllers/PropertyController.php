<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PropertyController extends Controller
{
    public function index()
    {
        $properties = DB::select("SELECT * FROM properties");
        //var_dump($properties);

        //Enviando Parametros para a view usando o with
        return view('property.index')->with('properties',$properties);

        //Enviando Paramentros para a view usando segundo parametro da função view
        //return view('property.index', ['properties' => $properties]);
    }

    public function create()
    {
        return view('property.create');
    }

    public function store(Request $request)
    {
        $property = [
            $request->title,
            $request->description,
            $request->rental_price,
            $request->sale_price
        ];

        DB::insert("INSERT INTO properties (title, description, rental_price, sale_price) VALUES (?,?,?,?)", $property);
        return redirect()->action([PropertyController::class,'index']);
    }
}
