@extends('layouts.dashAdmin')

@section('content')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="/home">Home</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ asset('assets/images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/invoice">Message</a>
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
    <!-- sales report area start -->
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Meets</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{ $meet }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Uploads</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{ $upload }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Email from NormUser</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{ $NormUser }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sales report area end -->
    
    
</div>
@endsection