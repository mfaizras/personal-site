@extends('admin.layouts.main')

@section('content')
    <style>
        .trix-button-group.trix-button-group--file-tools {
            display: none;
        }
    </style>
    <div class="card card-primary card-outline">

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <form action="/panel/projects" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="project_title" class="form-label">Project Title</label>
                    <input type="text" class="form-control" id="project_title" name="project_title"
                        placeholder="Your Project Title" value="">
                </div>
                <label for="project_image" class="form-label">Project Screenshoot</label><br>
                <input class="form-control" type="file" id="project_image" name="project_image">
                <div class="mb-3">
                    <label for="name" class="form-label">Project Description</label>
                    <input id="project_description" value="" type="hidden" name="project_description">
                    <trix-editor input="project_description"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="project_technology" class="form-label">Project Technology</label>
                    <input type="text" class="form-control" id="project_technology" name="project_technology"
                        placeholder="Your project_technology" value="">
                </div>
                <div class="mb-3">
                    <label for="project_url" class="form-label">Project URL</label>
                    <input type="text" class="form-control" id="project_url" name="project_url"
                        placeholder="Your Project URL" value="">
                </div>
                <div class="mb-3">
                    <label for="project_category" class="form-label">Project Category</label>
                    <input type="text" class="form-control" id="project_category" name="project_category"
                        placeholder="Your Project Category" value="">
                </div>
                <div class="mb-3">
                    <label for="project_category" class="form-label">Project Images</label>
                    <table class="table table-bordered mt-3" id="rundownTable">
                        <thead>
                            <td style="width: 30%">
                                Images Name
                            </td>
                            <td>
                                Images File
                            </td>
                            <td style="width: 20%">
                                Action
                            </td>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <input type="hidden" name="image[1][id]" value="">
                                    <input type="text" class="form-control" name="image[1][image_name]" value=""
                                        placeholder="image Name">
                                </td>

                                <td>
                                    <input type="file" class="form-control" value="" placeholder="Image"
                                        name="image[1][image_path]">
                                </td>

                                <td>
                                    <a onclick='myDeleteFunction("1")' class='btn btn-danger container-fluid'>Delete</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="p-2 float-right">
                        <a onclick="myCreateFunction()" class="btn btn-primary rounded-pill">Add more Image</a>
                    </div>
                </div>
                <button class="btn btn-primary container-fluid" type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("trix-file-accept", function(event) {
            event.preventDefault();
        });
    </script>
@endsection

@section('script')
    <script>
        var count = 1;

        function myCreateFunction() {
            count++;
            var table = document.getElementById("rundownTable");
            var row = table.insertRow();
            var waktu = row.insertCell(0);
            var rundown = row.insertCell(1);
            var action = row.insertCell(2);
            waktu.innerHTML =
                "<input type='hidden' name='image[" +
                count +
                "][id]' value=''><input type='text' class='form-control' name = 'image[" +
                count +
                "][image_name]' value = '' placeholder = 'image Name'> ";
            rundown.innerHTML = "<input type='file' class='form-control' name = 'image[" + count +
                "][image_path]' value = '' placeholder = 'image '>";
            action.innerHTML = "<a onclick='myDeleteFunction(" + count +
                ")' class='btn btn-danger container-fluid'>Delete</a>";
        }

        function myDeleteFunction(row) {
            count--;
            console.log(row + " test");
            document.getElementById("rundownTable").deleteRow(row);
        }
    </script>
@endsection
