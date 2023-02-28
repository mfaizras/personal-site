<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profile[0]->app_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</head>

<body>

    <section id="header">
        @if (!empty($profile[0]->about_picture))
            <img src="uploads/{{ $profile[0]->main_picture }}" alt="{{ $profile[0]->name }}" class="img-header">
        @else
            <img src="https://source.unsplash.com/featured/300x201?person" alt="{{ $profile[0]->name }}"
                class="img-header">
        @endif
        <h1>{{ $profile[0]->header }}</h1>
        <p>{{ $profile[0]->bio }}</p>
        <div class="sosmed mt-3">
            @foreach ($socmed as $data)
                <span class="me-2">
                    <a href="{{ $data->socmed_url }}" target="_blank"
                        class="text-white sosmed-link text-decratin-none"><i class="{{ $data->socmed_icon }}"></i></a>
                </span>
            @endforeach
        </div>
        <div class="scroll-button">
            <i class="fa-solid fa-chevron-down"></i>
        </div>
    </section>

    <div class="tabs-button container text-white mx-auto">
        <ul class="nav nav-butt text-center text-white">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#about-me"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">About Me</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#projects" type="button"
                    role="tab" aria-controls="profile-tab-pane" aria-selected="false">Projects</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
            </li>
        </ul>

    </div>
    <div class="tab-content" id="myTabContent">
        <div id="about-me" class="tab-pane fade show active" role="tabpanel" tabindex="0">
            <div class="container">
                <h1 class="section-header">about me</h1>
                <div class="row mt-5">
                    <div class="col-lg-5">
                        @if (!empty($profile[0]->about_picture))
                            <img src="uploads/{{ $profile[0]->about_picture }}" alt="{{ $profile[0]->name }}"
                                class="img-about">
                        @else
                            <img src="https://source.unsplash.com/featured/300x201" alt="{{ $profile[0]->name }}"
                                class="img-about">
                        @endif
                    </div>
                    <div class="col-lg-7">
                        <p>{!! $profile[0]->about_desc !!}</p>
                        @if (!empty($profile[0]->cv_link))
                            <a class="btn btn-green px-5 py-2 rounded-pill"
                                href="/uploads/{{ $profile[0]->cv_link }}">Download CV <i
                                    class="fa-solid fa-cloud-arrow-down"></i></a>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        <div id="projects" class="tab-pane fade" role="tabpanel" tabindex="0">
            <div class="container">
                <h1 class="section-header">My Projects</h1>
                <!-- <div class="row"> -->
                <!-- card and col -->
                <!-- <div class="col-lg-4">
                        <div class="projects-card">
                            <div class="card-body">
                                <div class="card-body-img">
                                    <img src="https://faizrashid.my.id/assets/catalog-id.PNG" alt="Catalog"
                                        class="img-fluid">
                                </div>
                                <div class="card-body-text">
                                    <div class="card-title">Catalog ID</div>
                                    <p>This tool is useful for monitoring the flow of money. this tool can record money
                                        spent
                                        for 1
                                        month, besides that this tool is connected to CURL BCA which can automatically
                                        see
                                        the
                                        existing balance on BCA so that it can be updated automatically on the website
                                    </p>
                                    <a href="" class="btn btn-green container-fluid rounded-pill">Try it</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  -->

                <div class="row">
                    {{-- <div class="col-lg-4">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="project-view">
                            <img src="https://faizrashid.my.id/assets/catalog-id.PNG" alt="Catalog"
                                class="img-fluid img-project">
                            <div class="background-project">
                                <button class="btn btn-dark text-img"><i class="fa-solid fa-eye"></i></button>
                            </div>
                        </a>
                    </div> --}}
                    @foreach ($project as $data)
                        <div class="col-lg-4 text-center">
                            <a type="button" data-bs-toggle="modal"
                                data-bs-target="#ProjectModal{{ $data->id }}" class="project-view">
                                @if (!empty($data->project_image))
                                    <img src="{{asset('/uploads/'.$data->project_image) }}" alt="{{ $data->project_title }}"
                                        class="img-fluid img-project">
                                @else
                                    <img src="https://source.unsplash.com/featured/300x201?project"
                                        alt="{{ $data->project_title }}" class="img-fluid img-project">
                                @endif
                                <div class="background-project">
                                    <button class="btn btn-dark text-img"><i class="fa-solid fa-eye"></i></button>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="contact" class="tab-pane fade" role="tabpanel" tabindex="0">
            <div class="container">
                <h1 class="section-header">Contact Me</h1>
                <p class="text-center">Fill this form to directly message me</p>
                @if (session()->has('message_send'))
                    <div class="alert alert-success">{{ session()->get('message_send') }}</div>
                @elseif (session()->has('message_send_failed'))
                    <div class="alert alert-danger">{{ session()->get('message_send_failed') }}</div>
                @endif
                <form action="/message">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput"
                            placeholder="Your Name">
                        <label for="floatingInput">Your Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"
                            name="message"></textarea>
                        <label for="floatingTextarea2">Message</label>
                    </div>
                    <button class="btn btn-green container-fluid py-2">Send Message!</button>
                </form>
            </div>
        </div>
    </div>
    @foreach ($project as $data)
        <div class="modal fade" id="ProjectModal{{ $data->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content bg-dark">
                    {{-- <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $data->project_title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div> --}}
                    <div class="modal-body">
                        <div class="row">
                            @if (!empty($data->image))
                                <div class="col">
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($data->image->sortByDesc('id') as $item)
                                                @if (!empty($item->image_path))
                                                    <div class="carousel-item active">
                                                        <img src="/uploads/{{ $item->image_path }}"
                                                            class="d-block w-100" alt="{{ $item->image_name }}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-8">
                                <h1 style="font-weight: bold; text-transform: uppercase;">{{ $data->project_title }}
                                </h1>
                                <small class="row" style="font-size: 13px">
                                    <div class="col">
                                        Project Category : {{ $data->project_category }}
                                    </div>
                                    <div class="col">
                                        Project Technology : {{ $data->project_technology }}
                                    </div>
                                </small>
                                <hr>
                                {!! $data->project_description !!}
                                <div>
                                    @if (!empty($data->project_url))
                                        <a class="btn btn-green px-5 py-2 rounded-pill container-fluid mt-3"
                                            href="{{ $data->project_url }}" target="_blank">Open
                                            Project</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Test
                </div>
            </div>
        </div>
    </div>
    <section id="footer mt-3">
        <p class="text-center">Copyright © 2022 Made With <span style="color: #e25555;">&#9829;</span> by <a
                href="http://faizrashid.my.id/" target="_blank" class="text-white">Faiz
                Rashid</a></p>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
