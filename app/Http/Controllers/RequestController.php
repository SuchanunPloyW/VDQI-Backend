<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestModel;

class RequestController extends Controller
{
    
    public function index()
    {
        return RequestModel::with('car_where','car_where')
                            ->with('car_station','car_station')
                            ->with('status','status')
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
            'car_chassis' => 'required|string|max:17',
            'car_position' => 'required|string',
            'car_where' => 'required|string',
            'car_status' => 'required|string',
            'car_station' => 'required|string',
            
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
        return RequestModel::where("car_chassis", "like", "%" . $car_chassis . "%")->paginate(25);;
    }
    public function search2($car_id)
    {
        return RequestModel::where("car_id", "like", "%" . $car_id . "%")->paginate(25);;
    }
}
