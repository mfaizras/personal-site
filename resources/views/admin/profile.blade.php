@extends('admin.layouts.main')

@section('content')
    <style>
        .trix-button-group.trix-button-group--file-tools {
            display: none;
        }
    </style>
    <div class="card card-primary card-outline">

        <div class="card-body">

            <form action="/panel/profile" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name"
                        value="{{ $datas[0]['name'] }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your email"
                        value="{{ $datas[0]['email'] }}">
                </div>
                <div class="mb-3">
                    <label for="site_link" class="form-label">Site Link</label>
                    <input type="text" class="form-control" id="site_link" name="site_link" placeholder="Your Site"
                        value="{{ $datas[0]['site_link'] }}">
                </div>
                <div class="mb-3">
                    <label for="main_picture" class="form-label">Main Picture</label><br>
                    @if (!empty($datas[0]['about_picture']))
                        <img src="{{ URL::to('/uploads/' . $datas[0]['about_picture']) }}" class="mb-2" width="80px"
                            height="80px">
                    @endif
                    <input class="form-control" type="file" id="main_picture" name="main_picture">
                </div>
                <div class="mb-3">
                    <label for="header" class="form-label">Header</label>
                    <input type="text" class="form-control" id="header" name="header" placeholder="Your header"
                        value="{{ $datas[0]['header'] }}">
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <input type="text" class="form-control" id="bio" name="bio" placeholder="Your bio"
                        value="{{ $datas[0]['bio'] }}">
                </div>
                <div class="mb-3">
                    <label for="about_picture" class="form-label">About Picture</label><br>
                    @if (!empty($datas[0]['about_picture']))
                        <img src="{{ URL::to('/uploads/' . $datas[0]['about_picture']) }}" class="mb-2" width="80px"
                            height="80px">
                    @endif
                    <input class="form-control" type="file" id="about_picture" name="about_picture">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">About me Description</label>
                    <input id="about_desc" value="{{ $datas[0]['about_desc'] }}" type="hidden" name="about_desc">
                    <trix-editor input="about_desc"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="cv_link" class="form-label">CV</label><br>
                    @if (!empty($datas[0]['cv_link']))
                        <a href="{{ URL::to('/uploads/' . $datas[0]['cv_link']) }}" class="btn btn-info mb-2">Download
                            CV</a>
                    @endif
                    <input class="form-control" type="file" id="cv_link" name="cv_link">
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
