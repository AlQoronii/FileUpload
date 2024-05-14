<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload(){
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request){
        // dump($request->berkas);
        // return "pemrosesan file upload di sini";


        // if ($request->hasFile('berkas')) {
        //     echo "path(): ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ". $request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ".
        //         $request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): ".$request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): " . 
        //         $request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): ".$request->berkas->getSize();
        // }else{
        //     echo "tidak ada berkas yang diupload";
        // }

        // $request->validate([
        //     'berkas'=>'required',
        // ]);
        // echo $request->berkas->getClientOriginalName(). "lolos validasi";
            
        // $request->validate([
        //     'berkas'=>'required|file|image|max:500',
        // ]);
        // echo  $request->berkas->getClientOriginalName(). "lolos validasi";

        // $request->validate([
        //     'berkas'=>'required|file|image|max:500'
        // ]);
        // $path = $request->berkas->store('uploads');
        // echo "proses upload berhasil, file berada di: $path";

        // $request->validate([
        //     'berkas'=>'required|file|image|max:500'
        // ]);
        // $path = $request->berkas->storeAs('uploads', 'berkas');
        // echo "proses upload berhasil, file berada di: $path";

        // ---
        // $request->validate([
        //     'berkas'=>'required|file|image|max:500'
        // ]);
        // $namaFile=$request->berkas->getClientOriginalName();
        // $path = $request->berkas->storeAs('uploads',$namaFile);
        // echo "proses upload berhasil, data disimpan di: $path";

        // Generate Nama Acak Manual
        // $request->validate([
        //     'berkas'=>'required|file|image|max:500'
        // ]);
        // $extFile=$request->berkas->getClientOriginalName();
        // $namaFile='web-'.time().".".$extFile;
        // $path = $request->berkas->storeAs('public',$namaFile); // mengganti uploads menjadi public
        // echo "proses upload berhasil, ,data disimpan pada:$path";
        // // Penambahan link agar gambar dapat diakses 
        // $pathBaru=asset('storage/'.$namaFile);
        // echo "proses upload berhasil, data disimpan di: $path";
        // echo "<br>";
        // echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";
        // ---


        //Method Move
        // $request->validate([
        //     'berkas'=>'required|file|image|max:500',
        // ]);
        // $extFile=$request->berkas->getClientOriginalName();
        // $namaFile='web-'.time().".".$extFile;

        // $path=$request->berkas->move('gambar',$namaFile);
        // $path= str_replace("\\","//", $path);
        // echo "Variabel path berisi: $path <br>";

        // $pathBaru=asset('gambar/'.$namaFile);
        // echo "proses upload berhasil, data disimpan pada:$path";
        // echo "<br>";
        // echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";

        //// Tugas
        $request->validate([
            'berkas'=>'required|file|image|max:500',
            'namaBerkas' => 'required',
        ]);
        // $extFile=$request->berkas->getClientOriginalName();
        $namaFile=$request->namaBerkas;

        $path=$request->berkas->move('gambar',$namaFile);
        $path= str_replace("\\","//", $path);
        echo "Variabel path berisi: $path <br>";
        $exten = $request->berkas->getClientOriginalExtension();
        $pathBaru=asset('gambar/'.$namaFile);
        echo "proses upload berhasil, data disimpan pada:$path";
        echo "<br>";
        echo "Gambar berhasil diupload dan diubah nama file menjadi: $namaFile.$exten";
        echo "<br>";
        echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";
        echo "<br>";
        echo "<img src="."gambar/".$namaFile.">";
    }
}
