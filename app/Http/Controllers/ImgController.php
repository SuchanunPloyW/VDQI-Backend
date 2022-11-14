<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImgModel;

use Intervention\Image\Facades\Image;


class ImgController extends Controller
{

    public function index()
    {
        $imgModel = ImgModel::all();
        return response()->json($imgModel);
    }


    public function store(Request $request)
    {
        /* $request->validate([
            'form_id' => 'required',
            'img_date' => 'required',
            'img_time' => 'required',
        ]); */

        for ($i = 0; $i < count($_FILES['img_path']['name']); $i++) {

            switch ($_FILES['img_path']['type'][$i]) {
                case 'image/jpeg':
                    $file = $_FILES['img_path']['tmp_name'][$i];
                    $sourceProperties = getimagesize($file);
                    $filename = "vdqi_" . time()  . date('Ymd') . rand(1000, 9999) . ".jpg";
                    $folderupload = public_path('/images/VDQI/thumbnail');
                    $path = $folderupload . "/" . $filename;
                    $img = Image::make($file);
                    $imageResourceId = imagecreatefromjpeg($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagejpeg($targetLayer, $path);
                    $img->save($path);
                    $data_img = array(
                        'form_id' => $request->form_id,
                        'img_date' => $request->img_date,
                        'img_time' => $request->img_time,
                        'img_path' => '/images/VDQI/thumbnail' . "/" . $filename,
                    );
                    $img = ImgModel::create($data_img);
                    break;

                case 'image/png':
                    $file = $_FILES['img_path']['tmp_name'][$i];
                    $sourceProperties = getimagesize($file);
                    $filename = "vdqi_" . time()  . date('Ymd') . rand(1000, 9999) . ".png";
                    $folderupload = public_path('/images/VDQI/thumbnail');
                    $path = $folderupload . "/" . $filename;
                    $img = Image::make($file);
                    $imageResourceId = imagecreatefrompng($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagepng($targetLayer, $path);

                    $img->save($path);
                    $data_img = array(
                        'form_id' => $request->form_id,
                        'img_date' => $request->img_date,
                        'img_time' => $request->img_time,
                        'img_path' => '/images/VDQI/thumbnail' . "/" . $filename,
                    );
                    $img = ImgModel::create($data_img);
                    break;

                case 'image/gif':
                    $file = $_FILES['img_path']['tmp_name'][$i];
                    $sourceProperties = getimagesize($file);
                    $filename = "vdqi_" . time()  . date('Ymd') . rand(1000, 9999) . ".gif";
                    $folderupload = public_path('/images/VDQI/thumbnail');
                    $path = $folderupload . "/" . $filename;
                    $img = Image::make($file);
                    $imageResourceId = imagecreatefromgif($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagegif($targetLayer, $path);

                    $img->save($path);
                    $data_img = array(
                        'form_id' => $request->form_id,
                        'img_date' => $request->img_date,
                        'img_time' => $request->img_time,
                        'img_path' => '/images/VDQI/thumbnail' . "/" . $filename,
                    );
                    $img = ImgModel::create($data_img);
                    break;
            }
        }
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

function imageResize($imageResourceId, $width, $height)
{
    $targetWidth = $width < 1280 ? $width : 1280;
    $targetHeight = ($height / $width) * $targetWidth;
    $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
    return $targetLayer;
}


/** show details */
function size_as_kb($size = 0)
{
    if ($size < 1048576) {
        $size_kb = round($size / 1024, 2);
        return "{$size_kb} KB";
    } else {
        $size_mb = round($size / 1048576, 2);
        return "{$size_mb} MB";
    }
}

function imgSize($img)
{
    $targetWidth = $img[0] < 1280 ? $img[0] : 1280;
    $targetHeight = ($img[1] / $img[0]) * $targetWidth;
    return [round($targetWidth, 2), round($targetHeight, 2)];
}