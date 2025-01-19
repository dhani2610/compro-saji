<?php

namespace App\Http\Controllers\Backend;

use App\Models\OurServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurServicesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['page_title'] = 'Our Services';
        $data['our_services'] = OurServices::orderBy('created_at', 'desc')->get();

        return view('backend.pages.our-services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = 'Tambah Data Our Services';
        return view('backend.pages.our-services.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = new OurServices();
            $data->judul = $request->judul;
            $data->deskripsi = $request->judul;
            if ($request->file('gambar')) {
                $image = $request->file('gambar');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/our-services/');
                $image->move($destinationPath, $name);
                $data->gambar = $name;
            }
            $data->save();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('our-services');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('our-services');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['page_title'] = 'Edit Gallery';
        $data['our_services'] = OurServices::find($id);

        return view('backend.pages.our-services.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = OurServices::find($id);
            $data->judul = $request->judul;
            $data->deskripsi = $request->judul;
            if ($request->file('gambar')) {
                $image = $request->file('gambar');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/our-services/');
                $image->move($destinationPath, $name);
                $data->gambar = $name;
            }
            $data->save();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('our-services');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('our-services');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = OurServices::find($id);
            $data->delete();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('our-services');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('our-services');
        }
    }
}
