<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbarsip;

class ArsipController extends Controller
{
    function index(){
        $data['list'] = Tbarsip::all();
        return view('arsip.index', $data);
    }
    function store(Request $request){

        $file = Tbarsip::uploadFile($request->file('files'));

        $simpan = Tbarsip::create([
            'nama_file' => $file['fileName'],
            'extention_file' => $file['fileExtentions'],
            'size_file' => $file['fileSize'],
            'path_file' => 'uploads',
        ]);

        return back()->with('success', 'Data berhasil disimpan');
    }
    function update(Request $request, Tbarsip $arsip){

        $files = $request->file('files');

        if($files != null){
            $hapusFile = Tbarsip::deleteFile($arsip->nama_file);
            if($hapusFile){
                $file = Tbarsip::uploadFile($files);
                $arsip->update([
                    'nama_file' => $file['fileName'],
                    'extention_file' => $file['fileExtentions'],
                    'size_file' => $file['fileSize'],
                    'path_file' => 'uploads',
                ]);
                return back()->with('success', 'Data berhasil disimpan');
            }
        }else{
            return back()->with('success', 'Data berhasil disimpan');
        }
    }

    function delete(Tbarsip $arsip){
        $hapusFile = Tbarsip::deleteFile($arsip->nama_file);
        if($hapusFile){
            $arsip->delete();
            return back()->with('success', 'Data berhasil dihapus');
        }
    }
}
