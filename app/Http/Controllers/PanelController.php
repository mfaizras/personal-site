<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'page' => 'Dashboard'
        ]);
    }
    public function login()
    {
        return view('admin.login', [
            'page' => 'Login'
        ]);
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/panel');
        }

        return back()->with([
            'failed' => 'Login Failed.',
        ])->onlyInput('username');
    }
    public function profile()
    {
        return view('admin.profile', [
            'datas' => Profile::find(1)->get(),
            'page' => 'Profile Edit'
        ]);
    }

    public function profileAction(Request $request)
    {
        $main_picture = $request->file('main_picture');
        $about_picture = $request->file('about_picture');
        $cv_link = $request->file('cv_link');

        $data['main_picture'] = '';
        $data['about_picture'] = '';
        $data['cv_link'] = '';

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'site_link' => $request->site_link,
            'header' => $request->header,
            'bio' => $request->bio,
            'about_desc' => $request->about_desc,
        ];

        if (isset($main_picture)) {
            $main_picture->store('', 'public_files');
            $data['main_picture'] = $main_picture->hashName();
        }
        if (isset($about_picture)) {
            $about_picture->store('', 'public_files');
            $data['about_picture'] = $about_picture->hashName();
        }
        if (isset($cv_link)) {
            $cv_link->store('', 'public_files');
            $data['cv_link'] = $cv_link->hashName();
        }

        // dd($data);
        Profile::find(1)->update($data);

        return redirect('/panel/profile');
    }
}
