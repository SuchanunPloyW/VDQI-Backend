<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImagesModel;

class ImageController extends Controller
{
    public function search($evaluation_id)
    {
        return ImagesModel::where("evaluation_id", "like", "%" . $evaluation_id . "%")
            ->paginate(100);
    }

    /* public function index()
    {
        $images = ImagesModel::all();
        return response()->json($images);
    } */


    /*  public function show($id)
    {
        return ImagesModel::find($id);
    } */


    /*  public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    } */
}