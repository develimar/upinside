<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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

    public function show($uname)
    {
        $property = DB::select("SELECT * FROM properties WHERE uname = ?", [$uname]);
        if (!empty($property)){
            return view('property.show')->with('property', $property);
        }else {
            return redirect()->action([PropertyController::class,'index']);
        }
    }


    public function create()
    {
        return view('property.create');
    }

    public function store(Request $request)
    {
        $propertySlug = $this->setName($request->title);
            $property = [
            $request->title,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $propertySlug
        ];

        DB::insert("INSERT INTO properties (title, description, rental_price, sale_price, uname) VALUES (?,?,?,?,?)", $property);
        return redirect()->action([PropertyController::class,'index']);
    }

    public function edit($uname)
    {
        $property = DB::select("SELECT * FROM properties WHERE uname = ?", [$uname]);
        if (!empty($property)){
            return view('property.edit')->with('property', $property);
        }else {
            return redirect()->action([PropertyController::class,'index']);
        }
    }

    public function update(Request $request, $id)
    {
        $propertySlug = $this->setName($request->title);

        $property = [
            $request->title,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $propertySlug,
            $id
        ];

        DB::update ("UPDATE properties  SET title = ?, description = ?, rental_price = ?, sale_price = ?, uname = ? WHERE id = ?", $property);
        return redirect()->action([PropertyController::class,'index']);
    }

    public function destroy($uname)
    {
        $property = DB::select("SELECT * FROM properties WHERE uname = ?", [$uname]);
        if (!empty($property)){
            DB::delete("DELETE FROM properties WHERE uname = ? ",  [$uname]);
        }
        return redirect()->action([PropertyController::class,'index']);
    }



    private function setName($title){

        $propertySlug = Str::slug($title);
        $properties = DB::select("SELECT * FROM properties");

        $t = 0;
        foreach ($properties as $property){
            if (Str::slug($property->title) === $propertySlug){
                $t++;
            }
        }

        if ($t > 0){
            $propertySlug = $propertySlug.'-'.$t;
        }

        return $propertySlug;
    }
}
