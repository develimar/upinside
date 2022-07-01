<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PropertyController extends Controller
{
    public function index()
    {
        //usando a facede
        //$properties = DB::select("SELECT * FROM properties");
        //var_dump($properties);

        //busca usando o model
        $properties = Property::all();

        //Enviando Parametros para a view usando o with
        return view('property.index')->with('properties',$properties);

        //Enviando Paramentros para a view usando segundo parametro da função view
        //return view('property.index', ['properties' => $properties]);
    }

    public function show($uname)
    {
        //Busca com condicionais
        //$property = DB::select("SELECT * FROM properties WHERE uname = ?", [$uname]);

        //busca com condicional via models
        $property = Property::where('uname',$uname)->get();

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
//            $property = [
//            $request->title,
//            $request->description,
//            $request->rental_price,
//            $request->sale_price,
//            $propertySlug
//        ];
//
//        DB::insert("INSERT INTO properties (title, description, rental_price, sale_price, uname) VALUES (?,?,?,?,?)", $property);
//        return redirect()->action([PropertyController::class,'index']);

            $property = [
                'title' => $request->title,
                'description' => $request->description,
                'rental_price' => $request->rental_price,
                'sale_price' => $request->sale_price,
                'uname' => $propertySlug
            ];

        if (!in_array(null, $property)){
            Property::create($property);
            return redirect()->action([PropertyController::class,'index']);
        }else{
            return redirect()->action([PropertyController::class,'index']);
        }
    }

    public function edit($uname)
    {
        //Busca via faced
        //$property = DB::select("SELECT * FROM properties WHERE uname = ?", [$uname]);

        //busca com condicional via models
        $property = Property::where('uname',$uname)->get();

        if (!empty($property)){
            return view('property.edit')->with('property', $property);
        }else {
            return redirect()->action([PropertyController::class,'index']);
        }
    }

    public function update(Request $request, $id)
    {
        $propertySlug = $this->setName($request->title);

//        $property = [
//            $request->title,
//            $request->description,
//            $request->rental_price,
//            $request->sale_price,
//            $propertySlug,
//            $id
//        ];
//
//        DB::update ("UPDATE properties  SET title = ?, description = ?, rental_price = ?, sale_price = ?, uname = ? WHERE id = ?", $property);

        $property = Property::find($id);

        $property->title = $request->title;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;
        $property->uname = $propertySlug;
        $property->save();

        return redirect()->action([PropertyController::class,'index']);
    }

    public function destroy($uname)
    {
        //Busca com condicional
        //$property = DB::select("SELECT * FROM properties WHERE uname = ?", [$uname]);

        //busca com condicional via models
        $property = Property::where('uname',$uname)->get();

        if (!empty($property)){
            //Delete Usando Facede
            //DB::delete("DELETE FROM properties WHERE uname = ? ",  [$uname]);

            //Delete usando model
            Property::destroy($property);
        }
        return redirect()->action([PropertyController::class,'index']);
    }



    private function setName($title){

        $propertySlug = Str::slug($title);

        //Busca usada pela facede
        //$properties = DB::select("SELECT * FROM properties");

        //Busca Usando a Model Properties
        $properties = Property::all();

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
