@extends('layouts.dashAdmin')
@section('invoice')
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="/home">Home</a></li>
                    <li><span>Invoice</span></li>
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
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-area">
                        <div class="invoice-head">
                            <div class="row">
                                <div class="iv-left col-6">
                                    <span>INVOICE</span>
                                </div>
                                <div class="iv-right col-6 text-md-right">
                                   
                            </div>
                        </div>
                        <div class="invoice-table table-responsive mt-5">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-capitalize">
                                        <th class="text-center" style="width: 5%;">id</th>
                                        <th style="min-width: 100px">Name</th>
                                        <th>Email</th>
                                        <th class="text-left" style="width: 45%; min-width: 130px;">Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($file as $file)
                                        <tr>
                                            <td>{{ $file -> id++ }}</td>
                                            <td>{{ $file -> name }}</td>
                                            <td>{{ $file -> email }}</td>
                                            
                                            <td>{{ $file -> message }}</td>
                                          
                                            <td>
                                                <a href="https://mailtrap.io/inboxes/1483198/messages"><button class="btn btn-outline-success">Visit Mailtrap Inboxes</button></a>
                                            </td> 
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection