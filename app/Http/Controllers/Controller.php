<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


//    the below function do rename image and move to provided path
    public function handelStoreObjectImages($images, $path)
    {
        $imagesName = (object)[];
        foreach ($images as $lang => $image) {
            try {
                $name = $image->getClientOriginalName();
                // replace the space or % (space) to nun in image name
                $name = str_replace(' ', '', $name);
                $name = str_replace('%', '', $name);
                $newNameImage = time() . '_' . $name;
                $pathImage = public_path($path);
                $image->move($pathImage, $newNameImage);
                $imagesName->{$lang} = $newNameImage;
            } catch (Exception $e) {
                $this->returnfilur($e);
            }
        }
        return $imagesName;
    }

//    the below function do synchronized image provided with current images

    public function handelUpdateObjectImages($oldImages, $newImage, $path)
    {
        $images = $oldImages;
        foreach ($newImage as $lang => $image) {
            $fullPathImage = public_path($path . '/' . $oldImages->{$lang});
            File::delete($fullPathImage);
            $images->{$lang} = $this->storeOneImage($image, $path);
        }
        return $images;
    }

    public function storeOneImage($image, $path)
    {
        $name = $image->getClientOriginalName();
        // replace the space or % (space) to nun in image name
        $name = str_replace(' ', '', $name);
        $name = str_replace('%', '', $name);
        $newNameImage = time() . '_' . $name;
        $pathImage = public_path($path);
        $image->move($pathImage, $newNameImage);
        return $newNameImage;
    }

//      the below function do delete images
    public function handelDeleteObjectImages($oldImages, $path)
    {
        foreach ($oldImages as $lang => $image) {
            $fullPathImage = public_path($path . '/' . $image);
            if (File::exists($fullPathImage)) {
                File::delete($fullPathImage);
            }

        }
    }

//     the below function do return error with success status code
    public function returnSuccess($data)
    {
        return response()->json(['state' => true, 'data' => $data]);
    }

//    the below function do return error with error status code
    public function returnfilur($errors)
    {
        return response()->json(['state' => false, 'errors' => $errors]);
    }
}
