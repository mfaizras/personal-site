@extends('admin.layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <main class="form-registration m-auto">
                    <form action="/panel/login" method="POST">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
                        @if (session()->has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session()->has('failed'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('failed') }}
                            </div>
                        @endif

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control  @error('username') is-invalid @enderror"
                                name="username" id="username" placeholder="username" autofocus required
                                value="{{ old('email') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="email">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required>

                            <label for="password">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
