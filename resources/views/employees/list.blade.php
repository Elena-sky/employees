@extends('layouts.header')

@section('content')

    <!-- Team Section -->
    <div id="contact" class="text-center">
        <div class="overlay">
            <div class="container">
            <div class="col-md-12 section-title">
                <h2>List of workers</h2>

                <a href="{{route('createEmployee')}}">
                    <button type="button" class="btn btn-default">
                        Create new employee
                    </button>
                </a>

                <table id="employees" class="table thead-light">
                    <thead>
                    <tr>
                        <th>photo </th>
                        <th>
                            <i class="fa fa-sort-desc sortTable" data-order-by="full_name" data-sort-order="desc" aria-hidden="true"></i>
                            name
                            <i class="fa fa-sort-asc sortTable" data-order-by="full_name" data-sort-order="asc" aria-hidden="true"></i>

                        </th>
                        <th>
                            <i class="fa fa-sort-desc sortTable" data-order-by="position" data-sort-order="desc" aria-hidden="true"></i>
                            position
                            <i class="fa fa-sort-asc sortTable" data-order-by="position" data-sort-order="asc" aria-hidden="true"></i>
                        </th>
                        <th>
                            <i class="fa fa-sort-desc sortTable" data-order-by="mentor" data-sort-order="desc" aria-hidden="true"></i>
                            mentor
                            <i class="fa fa-sort-asc sortTable" data-order-by="mentor" data-sort-order="asc" aria-hidden="true"></i>
                        </th>
                        <th>
                            <i class="fa fa-sort-desc sortTable" data-order-by="start_date" data-sort-order="desc" aria-hidden="true"></i>
                            start date
                            <i class="fa fa-sort-asc sortTable" data-order-by="start_date" data-sort-order="asc" aria-hidden="true"></i>
                        </th>
                        <th>
                            <i class="fa fa-sort-desc sortTable" data-order-by="salary" data-sort-order="desc" aria-hidden="true"></i>
                            salary
                            <i class="fa fa-sort-asc sortTable" data-order-by="salary" data-sort-order="asc" aria-hidden="true"></i>
                        </th>
                        <th></th>
                        <th></th>

                    </tr>
                    </thead>

                    <tbody id="employeesList">
                    @foreach($employees as $person)
                    <tr id="{{$person->id}}">
                        <td>
                            @if($person->photo)

                                <img src="{{ asset("/img/team/$person->photo") }}" width="50px"
                                     alt="{{$person->photo}}" class="img-circle team-img">

                            @else

                                <img src="{{ asset("/img/no_picture.jpg") }}" width="50px"
                                     alt="{{'no_picture'}}" class="img-circle team-img">

                            @endif
                        </td>
                        <td >{{$person->full_name}}</td>
                        <td>{{$person->position}}</td>
                        <td>{{$person->boss->full_name}}</td>
                        <td>{{$person->start_date}}</td>
                        <td>{{$person->salary}}</td>
                        <td>
                            <a href="{{route('updateEmployee', [$person->id])}}">
                                <button type="button" class="btn btn-default">Update
                                </button>
                            </a>
                        </td>
                        <td>
                            <button type="button" data-employee-id= "{{$person->id}}" class="btn btn-default delete" >Delete
                            </button>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>

                </table>

                <div>
                    {{$employees->links()}}
                </div>
                <script>
                </script>


            </div>

            </div>
        </div>
    </div>
@endsection
