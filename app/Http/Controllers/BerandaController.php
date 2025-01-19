<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Branding;
use App\Models\Footer;
use App\Models\Gallery;
use App\Models\OurServices;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BerandaController extends Controller
{
  

    public function landing(){
        $data['page_title'] = 'Home';
        $data['slider'] = Slider::orderBy('id','desc')->get();
        $data['profile'] = Profile::first();
        $data['our_services'] = OurServices::orderBy('id','desc')->get();
        $data['branding'] = Branding::orderBy('id','asc')->get();
        $data['project'] = Project::orderBy('id','asc')->get();
        $data['gallery'] = Gallery::orderBy('id','asc')->get();
        $data['footer'] = Footer::first();
        return view('frontend.index', $data);
    }
    public function register(){
        $data['page_title'] = 'Register';
        return view('backend.auth.register', $data);
    }

    public function registerStore(Request $request){
         try {
            $request->validate([
               'name' => 'required|max:50',
               'email' => 'required|max:100|email|unique:admins',
               'username' => 'required|max:100|unique:admins',
               'password' => 'required|min:6',
           ]);
   
           // Create New Admin
           $admin = new Admin();
           $admin->name = $request->name;
           $admin->username = $request->username;
           $admin->email = $request->email;
           $admin->password = Hash::make($request->password);
           $admin->save();
   
            $admin->assignRole('user');
   
           session()->flash('success', 'Register berhasil.');
           return redirect('admin/login');
         } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect('admin/register');
         }
    }
}
