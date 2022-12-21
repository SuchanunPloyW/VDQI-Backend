<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhereModel;

class WhereController extends Controller
{

    public function index()
    {
        $where = WhereModel::all();
        return response()->json($where);
    }


    public function store(Request $request)
    {
        $request->validate([
            'car_where' => 'required|string',
            'status' => 'required|string',

        ]);
        return WhereModel::create($request->all());
    }


    public function show($id)
    {
        return WhereModel::find($id);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'car_where' => 'required|string',
        ]);
        $where = WhereModel::find($id);
        $where->update($request->all());
        return response()->json($where);
    }


    public function destroy($id)
    {
        return WhereModel::destroy($id);
    }

    public function searchstatus($status)
    {
        return WhereModel::where("status", "like", "%" . $status . "%")->get();
    }
    public function searchstatusforweb($status)
    {
        return WhereModel::where("status", "like", "%" . $status . "%")

            ->orderBy('where_id', 'desc')->paginate(25);
    }
    public function search($status, $car_where)
    {
        return WhereModel::where("status", "like", "%" . $status . "%")
            ->where("car_where", "like", "%" . $car_where . "%")
            ->paginate(25);
    }

}