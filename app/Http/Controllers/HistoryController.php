<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoryModel;

class HistoryController extends Controller
{

    public function index()
    {
        return HistoryModel::with('car_where', 'car_where')
            ->with('car_status', 'car_status')
            ->paginate(300);
    }


    public function store(Request $request)
    {
        $request->validate([
            'car_chassis' => 'required',
            'car_where' => 'required',
            'car_status' => 'required',
            'date' => 'required',
            'time' => 'required',
            'fullname' => 'required',
            'lastname' => 'required',
        ]);
        return HistoryModel::create($request->all());
    }


    public function show($id)
    {
        return HistoryModel::find($id);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'car_chassis' => 'required',
            'car_where' => 'required',
            'car_status' => 'required',
            'date' => 'required',
            'time' => 'required',
            'fullname' => 'required',
            'lastname' => 'required',
        ]);
        $history = HistoryModel::find($id);
        $history->update($request->all());
        return response()->json($history);
    }

  
    public function destroy($id)
    {
        //
    }

    public function search($car_chassis)
    {
        return HistoryModel::where("car_chassis", "like", "%" . $car_chassis . "%")
            ->with('car_where', 'car_where')
            ->with('car_status', 'car_status')
                
            ->paginate(100);
    }
}