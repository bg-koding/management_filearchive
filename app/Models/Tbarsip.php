<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbarsip extends Model
{
    protected $table = 'tb_arsip';
    protected $fillable = [
        'nama_file',
        'extention_file',
        'size_file',
        'path_file'
    ];

    static $rules = [
        'nama_file' => 'required',
    ];

    static $messages = [
        'nama_file.required' => 'File wajib diisi',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    static function uploadFile($file) {
        if ($file != null) {
            // Pastikan $file adalah instance dari UploadedFile
            if ($file instanceof \Illuminate\Http\UploadedFile) {
                $fileName = time() . '_' . $file->hashName(); // Menggunakan hashName() pada file individual
                $fileExtentions = $file->extension();
                $fileSize = $file->getSize();
                $fileType = $file->getMimeType();
                $filePath = $file->move(public_path('uploads'), $fileName);

                return [
                    'fileName' => $fileName,
                    'fileExtentions' => $fileExtentions,
                    'fileSize' => $fileSize,
                    'fileType' => $fileType,
                    'filePath' => $filePath,
                ];
            }
        }
        return false;
    }

    static function deleteFile($file){
        if(file_exists(public_path('uploads').'/'.$file)){
            unlink(public_path('uploads').'/'.$file);
            return true;
        }
        return false;
    }
}
