@extends('templates.index')
@section('content')
    <main class="main">
        <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
            <div class="container position-relative">
                <h1>Daftar</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/" style="color: rgb(185, 122, 6)">Home</a></li>
                        <li class="current">Register Area</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->
        <div class="container" style="height: 40vh;margin-top:50px; margin-bottom: 100px;">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card shadow">
                        <div class="card-body">
                            <h3 class="card-title text-center text-warning mb-4">Daftar</h3>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form id="login-form" class="form" action="{{ route('register-area.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="fullname" class="text-warning">Nama Lengkap:</label>
                                    <input type="text" name="fullname" id="fullname" class="form-control"
                                        value="{{ old('fullname') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="text-warning">Email Address:</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-warning">Password:</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        value="{{ old('password') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="text-warning">Confirm Password:</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" required>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-warning btn-block">Daftar Sekarang</button>
                                </div>
                                <div class="text-center mt-2">
                                    <a href="{{ route('login-area.index') }}" class="text-warning">Masuk</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
