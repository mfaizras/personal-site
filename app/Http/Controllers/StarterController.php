<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Socmed;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use PharIo\Manifest\Url as ManifestUrl;

class StarterController extends Controller
{
    public function __construct()
    {
        $this->middleware('starterNotExist');
    }

    public function index()
    {
        return view('starter.index', [
            'page' => 'Starter Page'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'confirmed|min:6'
        ]);


        $validatedData['password'] = Hash::make($request['password']);

        if (!Artisan::call('migrate')) {
            User::create($validatedData);
            Profile::create([
                'name' => $request['username'],
                'email' => 'admin@mysite.com',
                'site_link' => URL::to('/'),
                'main_picture' => '',
                'header' => 'Hello my name is' . $request['username'],
                'bio' => 'A Normal Person',
                'about_picture' => '',
                'about_desc' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae culpa dolore maiores exercitationem nulla hic amet cupiditate earum quia dolorem.',
                'cv_link' => ''
            ]);
            Socmed::create(
                [
                    'socmed_name' => 'Instagram',
                    'socmed_url' => 'http://instagram.com/faizras_',
                    'socmed_icon' => 'fa-brands fa-instagram'
                ]
            );

            return redirect('/panel');
        }
    }
}
