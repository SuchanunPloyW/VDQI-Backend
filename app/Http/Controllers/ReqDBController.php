<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReqDBModel;

class ReqDBController extends Controller
{

    public function index()
    {
        return ReqDBModel::with('car_id', 'car_id')

            
            ->with('car_id.car_where', 'car_id.car_where')
            ->with('car_id.posit_id', 'car_id.posit_id')
            ->with('person')
            ->orderBy('req_id', 'desc')
            ->paginate(100);
    }


    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required',
            'req_date' => 'required',
            'req_time' => 'required',
        ]);
        return ReqDBModel::create($request->all());
    }

    public function show($id)
    {
        return ReqDBModel::find($id);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'person' => 'required',

        ]);
        $req = ReqDBModel::find($id);
        $req->update($request->all());
        return response()->json($req);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function searchmycar($person)
    {
        return ReqDBModel::where("person", "like", "%" . $person . "%")
            ->with('car_id', 'car_id')
            ->with('car_id.car_status')
            ->with('car_id.posit_id', 'car_id.posit_id')
            
            ->with('car_id.car_where', 'car_id.car_where')
            ->with('person')
            ->orderBy('req_id', 'ASC')
            ->paginate(100);
    }
    public function search($car_id)
    {
        return ReqDBModel::where("car_id", "like", "%" . $car_id . "%")
            ->with('car_id', 'car_id')
            ->with('car_id.posit_id', 'car_id.posit_id')
            
            ->with('car_id.car_where', 'car_id.car_where')
            ->with('person')
            /*  ->with("car_id.car_chassis") */
            /*   ->with('car_id.car_chassis') */
            ->paginate(100);
    }
}