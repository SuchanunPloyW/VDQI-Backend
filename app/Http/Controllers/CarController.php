<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;


class CarController extends Controller
{

    public function index()
    {
        //return CarModel::orderBy('car_id', 'desc')->paginate(25);
        return CarModel::with('car_where', 'car_where')
            ->with('car_status', 'car_status')
            ->orderBy('car_id', 'desc')
            ->paginate(25);
        /*  $carmodel =CarModel::all();
        return response()->json($carmodel); */
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_chassis' => 'required|string|max:17',
            'car_status' => 'required|string',
            'car_where' => 'required|string',
            'car_position' => 'required|string',
            'fullname' => 'required|string',
            'lastname' => 'required|string',
            'date' => 'required',
            'time' => 'required',
        ]);
        return CarModel::create($request->all());
    }

    public function show($id)
    {
        return CarModel::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'car_where' => 'required|string',
            'car_position' => 'required|string',
        ]);
        $carmodel = CarModel::find($id);
        $carmodel->update($request->all());
        return response()->json($carmodel);
    }


    public function destroy($id)
    {
        return CarModel::destroy($id);
    }

    public function search($car_chassis)
    {
        return CarModel::where("car_chassis", "like", "%" . $car_chassis . "%")
                      ->with('car_where','car_where')
                      ->with('car_status','car_status')
                      ->orderBy('car_id', 'desc')
                      ->paginate(25);
    }

    public function searchname($fullname)
    {
        return CarModel::where("fullname", "like", "%" . $fullname . "%")->get();
    }
}
