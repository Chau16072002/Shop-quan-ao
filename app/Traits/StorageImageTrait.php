<?php
namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait{
    public function storageTraitUpload($request, $fieldName, $folderName){
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20). '.' . $file->getClientOriginalExtension();
            
    
            $filepath = $request->file($fieldName)->storeAs('public/'. $folderName, $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath)
            ];
            return $dataUploadTrait;
        }
       return null;
    }
    public function storageTraitUploadMutiple($file, $folderName){
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20). '.' . $file->getClientOriginalExtension();       
            $filepath = $file->storeAs('public/'. $folderName, $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath)
            ];
            return $dataUploadTrait;
       
        }
}