@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">Patient Info</div>

                <div class="card-body">

                    <div>
                        <label>Name: {{ $patient->name }}</label>
                    </div>
                    <div>
                        <label>Email: {{ $patient->email }}</label>
                    </div>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">Patient Reports</div>

                <div class="card-body">

                    <div>

                        @foreach($patientreport as $report)

                            <label>File: {{ $report->file_name }}</label>
                          
                        @endforeach
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
