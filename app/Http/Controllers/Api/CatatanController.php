<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\catatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CatatanResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CatatanController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $posts = catatan::latest()->get();

        //return collection of posts as a resource
        return new CatatanResource(true, 'List Data Posts', $posts);
    }

      /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'nik'     => 'required',
            'tanggal'     => 'required',
            'waktu'   => 'required',
            'lokasi'   => 'required',
            'suhu_tubuh'=> 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

     
        //create post
        $post = catatan::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tanggal' => $request->tanggal,
            'waktu'  => $request->waktu,
            'lokasi'  => $request->lokasi,
            'suhu_tubuh'=>$request->suhu_tubuh,
        ]);

        //return response
        return new CatatanResource(true, 'Data Post Berhasil Ditambahkan!', $post);
    }

    public function show(catatan $post)
    {
        //return single post as a resource
        return new CatatanResource(true, 'Data Post Ditemukan!', $post);
    }

     /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, catatan $post)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'  => 'required',
            'nik'  => 'required',
            'tanggal'  => 'required',
            'waktu'   => 'required',
            'lokasi'   => 'required',
            'suhu_tubuh'=> 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('nama')) {

            //upload image
            // $image = $request->file('image');
            // $image->storeAs('public/posts', $image->hashName());

            // //delete old image
            // Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'nama'  => $request->nama,
                'nik'  => $request->nik,
                'tanggal'  => $request->tanggal,
                'waktu'  => $request->waktu,
                'lokasi'  => $request->lokasi,
                'suhu_tubuh' => $request->suhu_tubuh,
            ]);

        } else {

            //update post without image
            $post->update([
                'nama'  => $request->nama,
                'nik'  => $request->nik,
                'tanggal'     => $request->tanggal,
                'waktu'     => $request->waktu,
                'lokasi'   => $request->lokasi,
                'suhu_tubuh' => $request->suhu_tubuh,
            ]);
        }

        //return response
        return new CatatanResource(true, 'Data Post Berhasil Diubah!', $post);
    }

    public function destroy(catatan $post)
    {
        //delete image
        Storage::delete('public/posts/'.$post->nama);

        //delete post
        $post->delete();

        //return response
        return new CatatanResource(true, 'Data Post Berhasil Dihapus!', null);
    }

}