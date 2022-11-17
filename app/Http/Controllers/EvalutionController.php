<?php

namespace App\Http\Controllers;

use App\Models\EvaluationModel;
use App\Models\ImagesModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\CarDBModel;

class EvalutionController extends Controller
{

    /* public function index()
    {
        $evalutions = EvaluationModel::all();
        return response()->json($evalutions);
    } */


    public function store(Request $request)
    {
        $data = $request->validate([
            'person' => 'required',
            'team' => 'required',
            'car_chassis' => 'required | unique:evaluation_db',
            'branch' => 'required',
            'topic_1' => 'required ',
            'topic_2' => 'required',
            'topic_3' => 'required',
            'topic_4' => 'required',
            'topic_5' => 'required',
            'topic_6' => 'required',
            'topic_7' => 'required',
            'topic_8' => 'required',
            'topic_9' => 'required',
            'detail' => 'required',
        ]);
        $new_evalution = EvaluationModel::create($data);
        if ($request->has('image_path')) {
            for ($i = 0; $i < count($_FILES['image_path']['name']); $i++) {
                switch ($_FILES['image_path']['type'][$i]) {
                    case 'image/jpeg':
                        $file = $_FILES['image_path']['tmp_name'][$i];
                        $sourceProperties = getimagesize($file);
                        $filename = "vdqi_" . time()  . date('Ymd') . rand(1000, 9999) . ".jpg";
                        $folderupload = public_path('/images/VDQI/thumbnail');
                        $path = $folderupload . "/" . $filename;
                        $img = Image::make($file);
                        $imageResourceId = imagecreatefromjpeg($file);
                        $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                        imagejpeg($targetLayer, $path);
                        $img->save($path);
                        ImagesModel::create([
                            'image_path' => '/images/VDQI/thumbnail' . "/" . $filename,
                            'evaluation_id' => $new_evalution->evaluation_id,
                        ]);
                        break;
                    case 'image/png':
                        $file = $_FILES['image_path']['tmp_name'][$i];
                        $sourceProperties = getimagesize($file);
                        $filename = "vdqi_" . time()  . date('Ymd') . rand(1000, 9999) . ".png";
                        $folderupload = public_path('/images/VDQI/thumbnail');
                        $path = $folderupload . "/" . $filename;
                        $img = Image::make($file);
                        $imageResourceId = imagecreatefrompng($file);
                        $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                        imagepng($targetLayer, $path);
                        $img->save($path);
                        ImagesModel::create([
                            'image_path' => '/images/VDQI/thumbnail' . "/" . $filename,
                            'evaluation_id' => $new_evalution->evaluation_id,
                        ]);
                        break;
                    case 'image/gif':
                        $file = $_FILES['image_path']['tmp_name'][$i];
                        $sourceProperties = getimagesize($file);
                        $filename = "vdqi_" . time()  . date('Ymd') . rand(1000, 9999) . ".gif";
                        $folderupload = public_path('/images/VDQI/thumbnail');
                        $path = $folderupload . "/" . $filename;
                        $img = Image::make($file);
                        $imageResourceId = imagecreatefromgif($file);
                        $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                        imagegif($targetLayer, $path);
                        $img->save($path);
                        ImagesModel::create([
                            'image_path' => '/images/VDQI/thumbnail' . "/" . $filename,
                            'evaluation_id' => $new_evalution->evaluation_id,
                        ]);
                        break;
                }
            }
        }
    }
    public function chekchassis(Request $request)
    {
        $fields = $request->validate([
            'car_chassis' => 'required|string',

        ]);
        $chassis = CarDBModel::where('car_chassis', $fields['car_chassis'])->get();
        echo json_encode($chassis);
        if ($chassis->count() > 0) {
            return response()->json(['message' => 'มีเลขตัวถังนี้อยู่ในระบบแล้ว'], 201);
        } else {
            return response()->json(['message' => 'ไม่มีเลขตัวถังนี้อยู่ในระบบ'], 401);
        }
        /* if ($chassis->count() > 0) {
            return response()->json(['message' => 'มีเลขตัวถังนี้อยู่ในระบบแล้ว'], 400);
        } else {
            return response()->json(['message' => 'ไม่มีเลขตัวถังนี้อยู่ในระบบ'], 200);
        } */
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

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