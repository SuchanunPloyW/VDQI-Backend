<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoryModel;

class HistoryController extends Controller
{

    public function index()
    {

        return HistoryModel::with('car_id', 'car_id')
            ->with('car_where', 'car_where')
            ->with('car_status', 'car_status')
            ->with('car_id.posit_id', 'car_id.posit_id')
            ->with('person')


            ->paginate(300);
    }


    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required',
            'date' => 'required',
            'car_where' => 'required',
            'car_status' => 'required',

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
            'car_id' => 'required',
            'date' => 'required',

        ]);
        $history = HistoryModel::find($id);
        $history->update($request->all());
        return response()->json($history);
    }


    public function destroy($id)
    {
        //
    }

    public function search($car_id)
    {
        return HistoryModel::where("car_id", "like", "%" . $car_id . "%")
            ->with('car_id', 'car_id')
            ->with('car_status', 'car_status')
            ->with('car_where', 'car_where')
            ->with('car_id.posit_id', 'car_id.posit_id')
            ->with('person')
            ->paginate(100);
    }
}