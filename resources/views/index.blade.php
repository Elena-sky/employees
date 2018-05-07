
@extends('layouts.header')

@section('content')

    <!-- Header -->
    <header id="header">
        <div class="intro text-center">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="intro-text">
                            <h1>Welcome to <span class="brand">Employees</span></h1>
                            <p>This is online catalog of employees</p>
                            <a href="#services" class="btn btn-default btn-lg page-scroll">Learn More</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<!-- Services Section -->
<div id="services" class="text-center">
    <div class="container">
        <div class="col-md-10 col-md-offset-1 ">
            <h2>About employees</h2>

            <ul class="hierarchy">
                <li class="hierarchy__item expanded" draggable='true' data-id="{{$dataBoss->id}}" data-load="true">
                    <span class="hierarchy__item_content">{{$dataBoss->full_name}}&nbsp;&ndash;&nbsp;<span class="italic">{{$dataBoss->position}}</span></span>
                    @if ($dataBoss->workers->count() > 0)
                        <span class="hierarchy__item_toggle">&#91;&#9660;&#93;</span>
                        <ul class="hierarchy__sublist">
                            @foreach ($dataBoss->workers as $element)
                                <li class="hierarchy__item collapsed" draggable='true' data-id="{{$element->id}}" data-load="false">
                                    <span class="hierarchy__item_content">{{$element->full_name}}&nbsp;&ndash;&nbsp;<span class="italic">{{$element->position}}</span></span>
                                    @if ($element->workers->count() > 0)
                                        <span class="hierarchy__item_toggle">&#91;&#9654;&#93;</span>
                                        <i class="fa fa-spinner fa-pulse fa-fw hide"></i>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif


                </li>
            </ul>

        </div>
    </div>
</div>


@endsection
