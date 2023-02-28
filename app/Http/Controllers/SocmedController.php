<?php

namespace App\Http\Controllers;

use App\Models\Socmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocmedController extends Controller
{
    public function index()
    {
        return view('admin.socmed.index', [
            'page' => 'Socmed Setting',
            'datas' => Socmed::get(),
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request['socmed'])) {
            foreach ($request['socmed'] as $socmed) {
                DB::table('socmeds')
                    ->updateOrInsert(
                        ['id' => $socmed['id']],
                        [
                            'socmed_name' => $socmed['socmed_name'],
                            'socmed_url' => $socmed['socmed_url'],
                            'socmed_icon' => $socmed['socmed_icon'],
                            "created_at" =>  date('Y-m-d H:i:s'),
                            "updated_at" => date('Y-m-d H:i:s'),
                        ]
                    );
            }
        }
        return redirect('/panel/socmed')->with('status', 'Data Berhasil diubah / ditambahkan');
    }

    public function delete($id)
    {
        Socmed::where('id', $id)->delete();
        return redirect('/panel/socmed');
    }
}
