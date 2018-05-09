@extends('layouts.header')

@section('content')

    <div id="contact" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="col-md-6 col-md-offset-3 section-title">
                    <h2>Update - {{$employee->full_name}}</h2>
                </div>
                <div class="col-md-6 col-md-offset-3">

                    {!! Form::model($employee, array('route' => array('updatedEmployee', $employee->id), 'files' => true)
              ) !!}

                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        {!! Form::label('full_name', 'Full name:') !!}
                        <div>
                            {!! Form::text('full_name', $employee->full_name, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('position', 'Position:') !!}
                        <div>
                            {!! Form::text('position', $employee->position, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('boss', 'Boss (enter a name from 5 characters):') !!}
                        <div>
                            {!! Form::text('boss', $employee->boss->full_name, ['class' => 'form-control', 'id' => 'boss']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('start_date', 'Start date:') !!}
                        <div>
                            {!! Form::date('start_date', $employee->start_date, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('salary', 'Salary:') !!}
                        <div>
                            {!! Form::text('salary', $employee->salary, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('currentImage', 'Current photo') !!}

                            @if($employee->photo)

                                <img src="{{ asset("/img/team/$employee->photo") }}" width="200px"
                                     alt="{{$employee->photo}}">

                            @else

                                <img src="{{ asset("/img/no_picture.jpg") }}" width="200px"
                                     alt="{{'no_picture'}}">

                            @endif

                    </div>


                    <div class="form-group ">
                        {!! Form::label('photo', 'New Photo:') !!}
                        <div>
                            {!! Form::file('photo')!!}
                        </div>
                    </div>

                    {{ Form::button('save', ['class' => 'btn btn-default', 'type' => 'submit']) }}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


@endsection
