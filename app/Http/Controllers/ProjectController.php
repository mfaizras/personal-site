<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.project.index', [
            'datas' => Project::all(),
            'page' => 'Projects Page'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create', [
            'page' => 'Projects',
            'datas' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'project_image' => 'image',
            'image.*.image_path' => 'image'
        ], [
            'image.*.image_path.image' => 'Your file must be an image'
        ]);



        $img_array = [];

        $project_image = $request->file('project_image');
        $i = 0;

        $data['project_image'] = '';


        $data = [
            'project_title' => $request->project_title,
            'project_description' => $request->project_description,
            'project_technology' => $request->project_technology,
            'project_url' => $request->project_url,
            'project_category' => $request->project_category
        ];

        if (isset($project_image)) {
            $project_image->store('', 'public_files');
            $data['project_image'] = $project_image->hashName();
        }

        $create = Project::create($data);
      //dd($request->image);
        foreach ($request->image as $data) {
            // dd($data);
          if(isset($data['image_path']) || !empty($data['image_path'])){
            $image = !empty($data['image_path']) ? $data['image_path'] : [];
            $img_data = [];
            $i = 0;
            $image->store('', 'public_files');
            $img_data['image_path'] = $image->hashName();
            $img_data['image_name'] = !empty($data['image_name']) ? $data['image_name'] : '';
            $img_data['image_type'] = 'image';
            $img_data['table_id'] = $create->id;
            $i++;


            Image::create($img_data);
          }
        }



        return redirect('/panel/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.project.edit', [
            'page' => 'Project Edit',
            'datas' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'project_image' => 'image',
            'image.*.image_path' => 'image'
        ], [
            'image.*.image_path.image' => 'Your file must be an image'
        ]);

        $project_image = $request->file('project_image');
        $data['project_image'] = $project->project_image;

        $data = [
            'project_title' => $request->project_title,
            'project_description' => $request->project_description,
            'project_technology' => $request->project_technology,
            'project_url' => $request->project_url,
            'project_category' => $request->project_category
        ];

        if (isset($project_image)) {
            $project_image->store('', 'public_files');
            $data['project_image'] = $project_image->hashName();
        }

        $create = Project::where('id', $project->id)->update($data);
        // dd($request->image);
        foreach ($request->image as $data) {
            // dd($data);
            if (!empty($data['image_path'])) {
                $image = $data['image_path'];
                $image->store('', 'public_files');
                $hashName = $image->hashName();
            } else {
                // if ($request->id == null) {
                //     $hashName = '';
                // } else {
                //     $hashName = Image::find($data['id'])->image_path;
                // }
                // if ($request->id == null) {
                //     $hashName = '';
                // } else {
                $hashName = Image::find($data['id'])->image_path;
                // }
            }
            $img_data = [];
            $i = 0;
            $img_data['image_path'] = $hashName;
            $img_data['image_name'] = !empty($data['image_name']) ? $data['image_name'] : '';
            $img_data['image_type'] = 'image';
            $img_data['table_id'] = $project->id;
            $i++;


            Image::updateOrCreate(['id' => $data['id']], $img_data);
            // Image::updateOrCreate($img_data);
        }


        return redirect('/panel/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // dd($project);
        Project::where('id', $project->id)->delete();
        return redirect('/panel/projects');
    }
}
