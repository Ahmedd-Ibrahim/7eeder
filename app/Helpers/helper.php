<?php

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Pagination\LengthAwarePaginator;
function UploadImage($folder, $image){
    $image->store('/',$folder);
    $fileName = $image->hashNAme();
    return  $folder . '/' . $fileName;
}

function Resize($imageFile,$path_to_save,$width,$hight)
{
    $image       = $imageFile;
    $filename    = $image->hashName();
    $image_resize = Image::make($image->getRealPath());
    $image_resize->resize($width, $hight);
    $image_resize->save(public_path('/images/'. $path_to_save.'/' .$filename));
    return $path_to_save . '/' . $filename;
}

function RemoveImageFromDisk($pathFromDb)
{
    if(isset($pathFromDb) && $pathFromDb != null)
    {
        $photoRealPath =  public_path(). '/images/'.$pathFromDb;
        if(file_exists($photoRealPath))
        {
            unlink($photoRealPath);
        }
    }

}
 function arrayPaginator($items, $request) {
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $perPage = 10;
    $items = array_reverse(array_sort($items , function ($value) {
        return $value[‘created_at’];
    }));
    $currentItems = array_slice($items, $perPage * ($currentPage - 1), $perPage);
    $paginator = new LengthAwarePaginator($currentItems, count($items), $perPage, $currentPage,[‘path’ => $request->url(), ‘query’ => $request->query()]);
    return $results = $paginator->appends(‘filter’, request(‘filter’));
}
