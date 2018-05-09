@extends('layouts.header')

@section('content')

    <div id="contact" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="col-md-6 col-md-offset-3 section-title">
                    <h2>Create new employee</h2>
                </div>
                <div class="col-md-6 col-md-offset-3">

                    {!! Form::model('', array('route' => array('createdEmployee'), 'files' => true)
              ) !!}

                    <div class="form-group">
                        {!! Form::label('full_name', 'Full name:') !!}
                        <div>
                            {!! Form::text('full_name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('position', 'Position:') !!}
                        <div>
                            {!! Form::text('position', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('boss', 'Boss (enter a name from 5 characters):') !!}
                        <div>
                            {!! Form::text('boss', '', ['class' => 'form-control', 'id' => 'boss']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('start_date', 'Start date:') !!}
                        <div>
                            {!! Form::date('start_date', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('salary', 'Salary:') !!}
                        <div>
                            {!! Form::text('salary', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('photo', 'Photo:') !!}
                        <div>
                            {!! Form::file('photo', ['multiple' => true])!!}
                        </div>
                    </div>

                    {{ Form::button('Create', ['class' => 'btn btn-default', 'type' => 'submit']) }}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


@endsection
