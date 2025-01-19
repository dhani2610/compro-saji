<?php
namespace App\Http\Controllers\Backend;

use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['page_title'] = 'Profile';
        $data['profile'] = Profile::first();

        return view('backend.pages.profile.index', $data);
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
            $profile = Profile::first(); 

            if (!$profile) {
                $profile = new Profile();
            }

            // Validasi
            $request->validate([
                'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tentang_kami' => 'nullable|string',
                'visi' => 'nullable|string',
                'misi' => 'nullable|string',
            ]);

            // Simpan gambar jika diunggah
            if ($request->hasFile('background_image')) {
                if ($profile->background_image && file_exists(public_path('assets/img/profile/' . $profile->background_image))) {
                    unlink(public_path('assets/img/profile/' . $profile->background_image)); // Hapus gambar lama
                }

                $image = $request->file('background_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/img/profile/'), $imageName);
                $profile->background_image = $imageName;
            }

            $profile->tentang_kami = $request->tentang_kami;
            $profile->visi = $request->visi;
            $profile->misi = $request->misi;
            $profile->save();

            session()->flash('success', 'Data berhasil disimpan!');
            return redirect()->route('profile');
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('profile');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
