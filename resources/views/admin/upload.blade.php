@extends('layouts.dashAdmin')

@section('upload')
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Upload Documents</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ asset('assets/images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<i class="fa fa-angle-down"></i></h4>
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
<div class="row">
    <div class="col-lg-6 col-ml-12">
    
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
                                <th>Discription</th>
                                <th>Select Departments</th>
                                <th>File Upload</th>
                                <th colspan="2">Action</th>
                            </tr>
                            @forelse ($file as $file)
                                <tr>
                                    <td>{{ $file -> discription}}</td>
                                    <td>{{ $file -> select_department}}</td>
                                    <td>
                                    {{ $file->file }}
                                      @if($extension = 'pdf,txt')
                                      <img src='{{ asset('uploads/' . $extension. $file -> file) }}' alt="" class="fa fa-file-pdf-o">
                                      @else
                                          <i class="text-danger">upload_document</i>
                                      @endif

                                    </td>
                                    {{-- <td>{{ $file -> file  }}</td> --}}
                                    
                                    <td>
                                        <form action="/upload/{{ $file -> id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="/upload/{{ $file -> id }}/update" class="btn btn-outline-success">Edit</a>
                                            <button class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    <small class="text-danger"><i>No any document file was upload here</i></small>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="pagination_area pull-right mt-5">
                    <ul>
                        <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
       
        
        <div class="row">
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Textual inputs</h4>
                        <!-- Form inputs start -->
                        <form method="POST" action="upload" enctype="multipart/form-data"> 
                            @csrf
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Text</label>
                            <input class="form-control" type="text" value="{{ old('discription') }}" placeholder="Discription" name="discription" autocomplete="off">
                            @error('discription')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
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
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" value="{{ old('file')}}">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            @error('file')
                            <div class="alert alert-danger">
                             {{$message}}
                            </div>
                         @enderror
                        </div>
                       
                        <button type="submit" class="btn btn-outline-primary mt-4 pr-4 pl-4 btn-block">upload documents</button>
                    </form> 
                    <!-- Form inputs End -->    
                    </div>
                </div>
            </div>
            <!-- Textual inputs end -->
           
        </div>
    </div>
   
</div>
@endsection