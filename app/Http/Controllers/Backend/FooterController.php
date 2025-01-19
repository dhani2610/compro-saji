<?php

namespace App\Http\Controllers\Backend;

use App\Models\Footer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Footer';
        $data['footer'] = Footer::first();

        return view('backend.pages.footer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $footer = Footer::first(); 

            if (!$footer) {
                $footer = new Footer();
            }

            // Validasi
            $request->validate([
                'no_hp' => 'nullable|string',
                'alamat' => 'nullable|string',
                'email' => 'nullable|email',
                'link_embed_maps' => 'nullable',
            ]);

            $footer->no_hp = $request->no_hp;
            $footer->alamat = $request->alamat;
            $footer->email = $request->email;
            $footer->link_embed_maps = $request->link_embed_maps;
            $footer->save();

            session()->flash('success', 'Data berhasil disimpan!');
            return redirect()->route('footer');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('footer');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Footer $footer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Footer $footer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Footer $footer)
    {
        //
    }
}
