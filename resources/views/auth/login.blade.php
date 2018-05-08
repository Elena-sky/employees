@extends('layouts.header')

@section('content')

    <div id="contact" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="col-md-8 col-md-offset-2 section-title">
                    <h2>Login</h2>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="row">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-6 col-md-offset-3">
                                    <input id="email" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-6 col-md-offset-3">
                                    <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-default">Login</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
