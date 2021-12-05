@extends('layouts.departments')

@section('department_1')

<div id="fh5co-contact" class="fh5co-section animate-box">
    <div class="container">
        <div class="card-body">
            <h4 class="header-title">community-and-welfare</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-dark">
                            <tr class="text-white">
                                <th scope="col">Discription</th>
                                <th scope="col">Departments</th>
                                <th scope="col">Document</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse($department_6 as $department_6)
                               <tr>
                                    <td>{{ $department_6 -> 	discription }}</td>
                                    <td>{{ $department_6 -> 	select_department }}</td>
                                    <td>{{ $department_6 -> 	file }}</td>
                                    <td><a href="/download/{{ $department_6 -> id }}"><button class="btn btn-primary">Download</button></a></td>
                               </tr>
                           @empty
                               <i class="text-danger">No any update from this page!</i>
                           @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  

@endsection