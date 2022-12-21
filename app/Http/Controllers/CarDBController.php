<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarDBModel;

class CarDBController extends Controller
{

    public function index()
    {
        return CarDBModel::with('car_status', 'car_status')
            ->with('car_where', 'car_where')
            ->with('posit_id')
            ->with('person')
            ->orderBy('car_id', 'desc')
            ->paginate(100);
    }


    public function store(Request $request)
    {
        $request->validate([
            'car_chassis' => 'required|string|max:17 | unique:car_db',
            'posit_id' => 'required|string',
            'car_status' => 'required|string',
            'date' => 'required',
            'time' => 'required',
            'sort' => 'required',
            'person' => 'required',
        ]);
        return CarDBModel::create($request->all());
    }


    public function show($id)
    {
        return CarDBModel::with('car_status', 'car_status')
            ->with('car_where', 'car_where')
            ->with('posit_id')
            ->find($id);
    }

    public function showid($car_id)
    {
        return CarDBModel::where("car_id", "like", "%" . $car_id . "%")
            ->with('car_status', 'car_status')
            ->with('car_where', 'car_where')
            ->with('posit_id')
            ->with('person')



            ->paginate(100);
    }


    public function update(Request $request, $id)
    {
        $request->validate([


            'car_status' => 'required|string',
            'car_where' => 'required|string',

        ]);
        $carmodel = CarDBModel::find($id);
        $carmodel->update($request->all());
        return response()->json($carmodel);
    }


    public function destroy($id)
    {
        return CarDBModel::destroy($id);
    }

    public function search($car_chassis)
    {
        return CarDBModel::where("car_chassis", "like", "%" . $car_chassis . "%")
            ->with('car_where', 'car_where')
            ->with('car_status', 'car_status')
            ->with('posit_id')
            ->with('person')

            ->orderBy('car_id', 'desc')
            ->paginate(300);
    }

    public function status($car_status)
    {
        return CarDBModel::where("car_status", "like", "%" . $car_status . "%")
            ->with('car_where', 'car_where')
            ->with('posit_id', 'posit_id')
            ->with('car_status', 'car_status')
            ->with('person')
            ->orderBy('car_id', 'desc')
            ->paginate(300);
    }
    public function status_sort($sort)
    {
        return CarDBModel::where("sort", "like", "%" . $sort . "%")
            ->with('car_where', 'car_where')
            ->with('posit_id')

            ->with('car_status', 'car_status')
            ->with('person')
            ->orderBy('car_id', 'desc')
            ->paginate(300);
    }
    public function searchname($fullname)
    {
        return CarDBModel::where("fullname", "like", "%" . $fullname . "%")
            ->with('car_where', 'car_where')
            ->with('posit_id', 'posit_id')
            ->with('car_status', 'car_status')
            ->with('person')
            ->orderBy('car_id', 'desc')
            ->paginate(100);
    }

    public function saveID($car_chassis)
    {
        return CarDBModel::where("car_chassis", "like", "%" . $car_chassis . "%")
            ->with('car_where', 'car_where')
            ->with('posit_id', 'posit_id')
            ->with('car_status', 'car_status')
            ->with('person')
            ->orderBy('car_id', 'desc')
            ->get();
    }
}