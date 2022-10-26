<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PositionModel;

class PositionController extends Controller
{
   
    public function index()
    {
        return PositionModel::with('car_where','car_where')
                            ->orderBy('position_id')
                            ->paginate(300);

    }

    public function store(Request $request)
    {
        $request->validate([
            'car_position' => 'required', 
            'car_line' => 'required|string', 
            'car_where' => 'required', 
            'position_status' => 'required|string', 
           
        ]);
        return PositionModel::create($request->all());
    }

    public function show($id)
    {
        return PositionModel::find($id);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'position_status' => 'required|string', 
        ]);
        $position = PositionModel::find($id);
        $position->update($request->all());
        return response()->json($position);
    }

   
    public function destroy($id)
    {
        return PositionModel::destroy($id);
    }
    public function search($car_where ,$car_line){
        return PositionModel::where("car_where", "like", "%" . $car_where ."%")
                            ->where("car_line", "like", "%" . $car_line ."%")
                            ->with('car_where','car_where')
                            ->orderBy('position_id','ASC')
                            ->paginate(500);
    }
    public function searchposition($car_where ,$position_status){
        return PositionModel::where("car_where", "like", "%" . $car_where ."%")
                            ->where("position_status", "like", "%" . $position_status ."%")
                            ->with('car_where','car_where')
                            ->orderBy('position_id','ASC')
                            ->paginate(500);
    }
 


    /* public function search($position_status)
    {
        return PositionModel::where("position_status", "like", "%" . $position_status . "%")->paginate(500);
    }
    public function searchposition($car_where)
    {
        return PositionModel::where("car_where", "like", "%" . $car_where . "%")->paginate(500);
    } */
}
