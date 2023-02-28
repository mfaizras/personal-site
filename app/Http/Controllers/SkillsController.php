<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        return view('admin.skills.index', [
            'datas' => Skill::get(),
            'page' => 'Skill'
        ]);
    }

    public function store(Request $request)
    {
        foreach ($request->skill as $skill) {
            if (!empty($skill['skill_name'])) {
                Skill::updateOrCreate(['id' => $skill['id']], $skill);
            }
        }

        return redirect('/panel');
    }
}
