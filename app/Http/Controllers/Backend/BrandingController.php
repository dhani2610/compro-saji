<?php

namespace App\Http\Controllers\Backend;

use App\Models\Branding;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['page_title'] = 'Branding';
        $data['branding'] = Branding::orderBy('created_at', 'desc')->get();

        return view('backend.pages.branding.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = 'Tambah Data Slider';
        return view('backend.pages.branding.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = new Branding();
            $data->title = $request->title;
            if ($request->file('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/branding/');
                $image->move($destinationPath, $name);
                $data->image = $name;
            }
            $data->save();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('branding');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('branding');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Branding $Branding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['page_title'] = 'Edit Branding';
        $data['branding'] = Branding::find($id);

        return view('backend.pages.branding.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Branding::find($id);
            $data->title = $request->title;
            if ($request->file('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/branding/');
                $image->move($destinationPath, $name);
                $data->image = $name;
            }
            $data->save();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('branding');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('branding');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Branding::find($id);
            $data->delete();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('branding');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('branding');
        }
    }
}
