<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatusModel;


class StatusController extends Controller
{
 
    public function index()
    {
        $status =StatusModel::paginate(25);
        return response()->json($status);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
        ]);
        return StatusModel::create($request->all());
    }

    
    public function show($id)
    {
        return StatusModel::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);
        $status = StatusModel::find($id);
        $status->update($request->all());
        return response()->json($status);
    }

    
    public function destroy($id)
    {
        return StatusModel::destroy($id);
    }

    
    public function search($status)
    {
       return StatusModel::where("status","like","%".$status."%")->get();
    }
}
