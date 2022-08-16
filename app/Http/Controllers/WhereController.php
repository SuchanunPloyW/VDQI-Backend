<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhereModel;

class WhereController extends Controller
{
    
    public function index()
    {
        $where = WhereModel ::paginate(25);
        return response()->json($where);
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'car_where' => 'required|string', 
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
}
