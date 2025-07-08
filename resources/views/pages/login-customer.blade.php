@extends('templates.index')
@section('content')
    <main class="main">
        <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
            <div class="container position-relative">
                <h1>Masuk</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/" style="color: rgb(185, 122, 6)">Home</a></li>
                        <li class="current">Login Area</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container" style="height: 40vh;margin-top:50px;">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3 class="card-title text-center text-warning mb-4">Masuk</h3>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form id="login-form" class="form" action="{{ route('login-area.authenticate') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="text-warning">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-warning">Password:</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-warning btn-block">Masuk</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
