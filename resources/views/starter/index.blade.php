@extends('admin.layouts.main')

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="m-0 text-center">Setup Your Page</h5>
        </div>
        <div class="card-body">
            <h6 class="card-title text-bold">Here's How To Setup Your App</h6>

            <p class="card-text">Fill this form below to complete setup your App. It will create some Table on your database
                that will needed for your site. And to manage your site on Admin Panel</p>


            <form method="POST" action="/starter/">
                @csrf
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="inputUsername"
                        name="username" value="{{ old('username') }}" aria-describedby="usernameHelp" placeholder="Username"
                        required>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div id="usernameHelp" class="form-text">This username used to login to your Admin Panel Site.</div>
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="inputPassword" placeholder="Password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="confirmationPassword" class="form-label">Confirmation Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirmationPassword"
                        placeholder="Confirmation Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
