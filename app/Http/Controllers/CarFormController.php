<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\CarFormModel;
use Intervention\Image\Facades\Image;



class CarFormController extends Controller
{

    public function index()
    {
       /*  $carFormModel = CarFormModel::all();
        return response()->json($carFormModel); */
    }

    public function store(Request $request)
    {
        $request->validate([
            'Person' => 'required',
            'Team' => 'required',
            'Branch' => 'required',
            'car_chassis' => 'required|string|max:17',
            'Topic_1' => 'required',
            'Topic_2' => 'required',
            'Topic_3' => 'required',
            'Topic_4' => 'required',
            'Topic_5' => 'required',
            'Topic_6' => 'required',
            'Topic_7' => 'required',
            'Topic_8' => 'required',
            'Topic_9' => 'required',
            'date' => 'required',
            'time' => 'required',
            'Detail' => 'required',


        ]);

        // กำหนดตัวแปรจากฟอร์ม
        $data_form = array(
            'Person' => $request->input('Person'),
            'Team' => $request->input('Team'),
            'Branch' => $request->input('Branch'),
            'car_chassis' => $request->input('car_chassis'),
            'Topic_1' => $request->input('Topic_1'),
            'Topic_2' => $request->input('Topic_2'),
            'Topic_3' => $request->input('Topic_3'),
            'Topic_4' => $request->input('Topic_4'),
            'Topic_5' => $request->input('Topic_5'),
            'Topic_6' => $request->input('Topic_6'),
            'Topic_7' => $request->input('Topic_7'),
            'Topic_8' => $request->input('Topic_8'),
            'Topic_9' => $request->input('Topic_9'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'Detail' => $request->input('Detail'),
        );

        //รับไฟล์รูปภาพ
        $Image = $request->file('Image');
        if (!empty($Image)) {
            $file_name = "vdqi_" . time() . "." . $Image->getClientOriginalExtension();

            $folderupload = public_path('/images/VDQI/thumbnail');
            $path = $folderupload . "/" . $file_name;
            $img = Image::make($Image->getRealPath());
            $img->orientate();
            $img->save($path);
            
            $data_form['Image'] = url('/') . '/images/VDQI/thumbnail/' . $file_name;
        } else if (empty($Image)) {

            $data_form['Image'] = url('/') . '/images/VDQI/thumbnail/no_img.jpg';
        }

        return CarFormModel::create($data_form);





        /*  if (!empty($Image)) {
            $file_name = "vdqi_" . time() . "." . $Image->getClientOriginalExtension();
            $imgWidth = 500;
            $imgHeight = 500;
            $folderupload = public_path('/images/VDQI/thumbnail');
            $path = $folderupload."/".$file_name;
            $img = Image::make($Image->getRealPath());
            $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            });
            
            $img->save($path);
            $destinationPath = public_path('/images/VDQI/original');
            $Image->move($destinationPath, $file_name);

            $data_form['Image'] = url('/').'/images/VDQI/thumbnail/'.$file_name;
        } else {
            $data_form['Image'] = url('/').'/images/VDQI/thumbnail/no_img.jpg';
        }
        return CarFormModel::create($data_form); */




        /*  return CarFormModel::create($request->all()); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}