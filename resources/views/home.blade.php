@extends('layouts.header')

@section('content')

    <div id="contact" class="text-center">
        <div class="overlay" style="padding: 100px 0 510px 0;">
            <div class="container">
                <div class="col-md-8 col-md-offset-2 section-title">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>You are logged in!</h2>
                </div>
            </div>
        </div>
    </div>

@endsection
