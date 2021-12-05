@extends('layouts.dashAdmin')

@section('form')
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="/home">Home</a></li>
                    <li><span>Form</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="invoice">Message</a>
                    {{-- <a class="dropdown-item" href="#">Log Out</a> --}}
                    <div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">

<!-- order list area start -->
<div class="card mt-5">
    <div class="card-body">
        <h4 class="header-title">Todays Order List</h4>
        <div class="table-responsive">
             {{-- session message start here --}}
             @if (session('success'))
             <div class="alert alert-success">
                 {{session('success')}}
             </div>
             @endif
             {{-- session message End here --}}
            <table class="dbkit-table">
                <tbody>
                    <tr class="heading-td">
                        <th>text</th>
                        <th>message</th>
                        <th>date_and_time</th>
                        <th>select_department</th>
                        <th colspan="2">Action</th>
                    </tr>
                    @forelse ($fechi as $fech)
                        <tr>
                            <td>{{ $fech -> text}}</td>
                            <td>{{ $fech -> message}}</td>
                            <td>{{ $fech -> date_and_time}}</td>
                            <td>{{ $fech -> select_department}}</td>
                            {{-- <td></td> --}}
                            <td>
                                <form action="/blogs/{{ $fech -> id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/formulation/{{ $fech -> id }}/edit" class="btn btn-outline-success">Edit</a>
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            <small class="text-danger"><i>No any meeting was upload here</i></small>
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- order list area end -->

    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Textual inputs</h4>
                            <!-- Form inputs start -->
                            <form method="POST" action="formstore"> 
                                @csrf
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Text</label>
                                <input class="form-control" type="text" value="{{ old('text') }}" placeholder="Text" name="text" autocomplete="off">
                                @error('text')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                        <div class="col-md-12">
                            <label for="example-text-input" class="col-form-label">Message Input</label>
                            <div class="form-group">
                                <textarea name="message" class="form-control" cols="30" rows="7" placeholder="Message" autocomplete="off"></textarea>
                                @error('message')
                                <div class="alert alert-danger">
                                 {{$message}}
                                </div>
                            @enderror
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="example-datetime-local-input" class="col-form-label">Date and time</label>
                                <input class="form-control" type="datetime-local" value="{{ old('date_and_time') }}" id="example-datetime-local-input" name="date_and_time">
                                @error('date_and_time')
                                <div class="alert alert-danger">
                                 {{$message}}
                                </div>
                            @enderror
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Custom Select</label>
                                <select class="custom-select" name="select_department" value="{{ old('select_department') }}">
                                    <option value="">Open this select menu</option>
                                    <option value="human-resource-and-administration">human-resource-and-administration</option>
                                    <option value="urban-planning-and-environment">urban-planning-and-environment</option>
                                    <option value="finance-and-trade">finance-and-trade</option>
                                    <option value="environment-and-sanitation">environment-and-sanitation</option>
                                    <option value="education">education</option>
                                    <option value="community-and-welfare">community-and-welfare</option>
                                    <option value="agricultre-and-cooperative">agricultre-and-cooperative</option>
                                    <option value="livestock-and-fisheries">livestock-and-fisheries</option>
                                    <option value="works">works</option>
                                    <option value="health">health</option>
                                    <option value="water">water</option>
                                    <option value="planning-statistics-and-monitoring">planning-statistics-and-monitoring</option>
                                </select>
                                @error('select_department')
                                <div class="alert alert-danger">
                                 {{$message}}
                                </div>
                                 @enderror
                            </div>
                            <button type="submit" class="btn btn-outline-primary mt-4 pr-4 pl-4 btn-block">upload meeting</button>
                        </form> 
                        <!-- Form inputs End -->    
                        </div>
                    </div>
                </div>
                <!-- Textual inputs end -->
               
            </div>
        </div>
       
    </div>
</div>
@endsection