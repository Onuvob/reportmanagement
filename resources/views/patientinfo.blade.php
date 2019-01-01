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

                        @foreach($patientreport as $num => $report)

                            <div>
                                <label>Report {{$num+1}}: 

                                    <a href="{{ asset('storage/report/'. $report->file_name) }}">Open the file!</a>

                                </label>
                            </div>

                            
                          
                        @endforeach
                        
                    </div>
                    
                </div>
            </div>


            <div class="card">
                <div class="card-header">Report Submit</div>

                <div class="card-body">

                    <div>

                        <form method="POST" action="{{ url('patient') }}"  enctype="multipart/form-data">

                            @csrf
                            
                            
                            <div id="" class="">

                                <label>Upload report : </label><input required="required" type="file" name="patientFile" accept=".doc, .docx, .pdf">

                                <input type="number" name="pId" hidden="hidden" value="{{ $patient->id }}">
                                

                                <!-- Form Submit button -->
                                <div class="row justify-content-center">
                                          
                                    <button type="submit" class="btn btn-success text-light">Submit</button>

                                </div>
                                <!--End Form Submit button-->

                            </div>
                            <!-- End Journal -->
                        </form>

                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
