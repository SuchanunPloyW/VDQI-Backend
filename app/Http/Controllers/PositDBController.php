<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PositDBModel;

class PositDBController extends Controller
{

    public function index()
    {
        return PositDBModel::with('car_where', 'car_where')
            ->with('car_status', 'car_status')
            ->with('car_id', 'car_id')
            ->paginate(300);

        /* $posit = PositDBModel::all()->orderBy('sort');
        return response()
        
        ->json($posit); */
    }

    public function PositWhere($car_where)
    {
        return  PositDBModel::where("car_where", "like", "%" . $car_where . "%")
            ->with('car_where', 'car_where')
            ->with('car_id', 'car_id')
            ->orderBy('sort', 'ASC')
            ->paginate(500);
    }

    public function PositWhereLine($car_where, $line)
    {
        return  PositDBModel::where("car_where", "like", "%" . $car_where . "%")
            ->where("line", "like", "%" . $line . "%")
            ->with('car_where', 'car_where')
            ->with('car_id', 'car_id')
            ->orderBy('posit', 'ASC')
            ->paginate(500);
    }


    public function store(Request $request)
    {
        $request->validate([
            'line' => 'required|string',
            'posit' => 'required',
            'sort' => 'required',
            'car_where' => 'required',
            'car_status' => 'required',
            'car_id' => 'required',

        ]);
        return PositDBModel::create($request->all());
    }


    public function show($id)
    {
        return PositDBModel::find($id);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'car_status' => 'required',
            'car_id' => 'required',
        ]);
        $posit = PositDBModel::find($id);
        $posit->update($request->all());
        return response()->json($posit);
    }


    public function destroy($id)
    {
        return PositDBModel::destroy($id);
    }

    public function search($car_where, $line)
    {
        return PositDBModel::where("car_where", "like", "%" . $car_where . "%")
            ->where("line", "like", "%" . $line . "%")
            ->with('car_where', 'car_where')
            ->with('car_id', 'car_id')
            ->orderBy('sort', 'ASC')
            ->paginate(500);
    }
    public function status($car_status)
    {
        return PositDBModel::where("car_status", "like", "%" . $car_status . "%")
            ->with('car_where', 'car_where')
            ->with('car_id', 'car_id')
            ->orderBy('sort', 'ASC')
            ->paginate(500);
    }

    public function statusCheck($car_status,$car_where)
    {
        return PositDBModel::where("car_status", "like", "%" . $car_status . "%")
            ->where("car_where", "like", "%" . $car_where . "%")
            ->with('car_where', 'car_where')
            ->with('car_id', 'car_id')
            ->orderBy('sort', 'ASC')
            ->paginate(500);
    }




    public function car_id($car_id)
    {
        return PositDBModel::where("car_id", "like", "%" . $car_id . "%")
            ->orderBy('sort', 'ASC')
            ->paginate(500);
    }
}