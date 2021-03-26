@extends('layouts.appmaster')
@section('title', 'Home')

@section('content')

<div class="header">
<h4>Testing Build Pipeline!</h4>
<h3>Make your goals into a</h3>
<h1>REALITY</h1>
</div>

<div class="home-content">
    <div class="shadow-box">

        <div class="container mt-5 pt-5">
            <div class="card mx-auto border-0">
                <div class="card-header border-bottom-0 bg-transparent">
                <ul class="nav nav-tabs justify-content-center pt-4" id="pills-tab" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login"
                        aria-selected="true">Login</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link text-primary" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register"
                        aria-selected="false">Register</a>
                    </li>
                </ul>
                </div>

                <div class="card-body pb-4">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                    <form action="login" method="POST">
                        <input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
                        <div class="form-group">
                        <input type="username" name="username" class="form-control" id="username" placeholder="Username" required autofocus>
                        </div>

                        <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" id="password" placeholder="Password" required>
                        </div>

                        <div class="text-center pt-4">
                        <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        @if(session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </form>
                    </div>

                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                    <form action="register" method="POST">
                        <input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
                        <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old("email") }}" required>
                        </div>
                        <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="{{ old("username") }}" required autofocus>
                        </div>
                        <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Set a password" value="{{ old("password") }}" required>
                        </div>
                        <div class="text-center pt-2 pb-1">
                        <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        @if ($errors->has('username'))
                        {{ $errors->first('username') }}
                     @endif
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
    </div>
</div>
@endsection
