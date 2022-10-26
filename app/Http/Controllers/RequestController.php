<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestModel;

class RequestController extends Controller
{

    public function index()
    {
        return RequestModel::with('car_station', 'car_station')
            ->with('car_status', 'car_status')
            ->orderBy('req_id')
            ->paginate(25);
    }


    public function store(Request $request)
    {
        $request->validate([
            'car_chassis' => 'required|string|max:17',
            'fullname' => 'required|string',
            'lastname' => 'required|string',
            'req_date' => 'required|string',
            'req_time' => 'required|string',
            'car_position' => 'required|string',
            'car_where' => 'required|string',
            'car_status' => 'required|string',
            'car_station' => 'required|string',


        ]);
        return RequestModel::create($request->all());
    }

    public function show($id)
    {
        return RequestModel::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        
            'car_position' => 'required|string',
            'car_where' => 'required|string',
            'car_line' => 'required|string',
            'car_status' => 'required|string',
            

        ]);
        $req = RequestModel::find($id);
        $req->update($request->all());
        return response()->json($req);
    }

    public function destroy($id)
    {
        return RequestModel::destroy($id);
    }

    public function search($car_chassis)
    {
        return RequestModel::where("car_chassis", "like", "%" . $car_chassis . "%")
            
            ->with('car_station', 'car_station')
            ->with('car_status', 'car_status')
            ->orderBy('req_id', 'ASC')
            ->paginate(100);
    }

    
    public function searchstatus($car_status)
    {
        return RequestModel::where("car_status", "like", "%" . $car_status . "%")
          
            ->with('car_station', 'car_station')
            ->with('car_status', 'car_status')
            ->orderBy('req_id', 'ASC')
            ->paginate(25);
    }

    public function searchmycar($fullname, $car_status)
    {
        return RequestModel::where("fullname", "like", "%" . $fullname . "%")
            ->where("car_status", "like", "%" . $car_status . "%")
           
            ->with('car_station', 'car_station')
            ->with('car_status', 'car_status')
            ->orderBy('req_id', 'ASC')
            ->paginate(25);
    }
}