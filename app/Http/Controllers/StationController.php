<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StationModel;


class StationController extends Controller
{
    
    public function index()
    {
        $station = StationModel::paginate(25);
        return response()->json($station);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'car_station' => 'required|string',
           
        ]);
        return StationModel::create($request->all());
    }

   
    public function show($id)
    {
        return StationModel::find($id);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'car_station' => 'required|string',
            
        ]);
        $station = StationModel::find($id);
        $station->update($request->all());
        return response()->json($station);
    }

    
    public function destroy($id)
    {
        return StationModel::destroy($id);
    }
}
