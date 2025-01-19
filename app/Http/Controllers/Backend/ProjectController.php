<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['page_title'] = 'Project';
        $data['project'] = Project::orderBy('created_at', 'desc')->get();

        return view('backend.pages.project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = 'Tambah Data Project';
        return view('backend.pages.project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = new Project();
            $data->judul = $request->judul;
            $data->deskripsi = $request->judul;
            if ($request->file('gambar')) {
                $image = $request->file('gambar');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/project/');
                $image->move($destinationPath, $name);
                $data->gambar = $name;
            }
            $data->save();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('project');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('project');
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
        $data['project'] = Project::find($id);

        return view('backend.pages.project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Project::find($id);
            $data->judul = $request->judul;
            $data->deskripsi = $request->judul;
            if ($request->file('gambar')) {
                $image = $request->file('gambar');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/project/');
                $image->move($destinationPath, $name);
                $data->gambar = $name;
            }
            $data->save();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('project');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('project');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Project::find($id);
            $data->delete();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('project');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('project');
        }
    }
}
