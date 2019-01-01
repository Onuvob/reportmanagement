@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Patient Id</th>
                                <th scope="col">Info</th>
                            </tr>
                        </thead>

                        @foreach($patientlist as $patient)

                            <tbody>
                                <tr>
                                    <th scope="row">@</th>
                                    <td>{{ $patient->id }}</td>
                                    <td><a class="nav-link text-light" href="{{ url('patient/'. $patient->id ) }}">View</a></td>
                                </tr>
                                
                            </tbody>
                          
                        @endforeach

                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
