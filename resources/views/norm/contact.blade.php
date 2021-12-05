@extends('layouts.dashi')

@section('conctact')

<div id="fh5co-contact" class="fh5co-section animate-box">
    <div class="container">
        <form action="contact" method="post">
            @csrf
            <div class="row">
               {{-- Our Address layout start here --}}       
                <div class="col-md-6">
                    <h3 class="section-title">Our Address</h3>
                    <p>Jamuhuri ya Muungano wa Tanzania
                        Ofisi ya Raisi Tawala za Mikoa na Serikali za Mitaa
                        Halmashauri ya Manispaa ya Morogoro</p>
                    <ul class="contact-info">
                        <li><i class="icon-location-pin"></i>Tanzania, Morogoro</li>
                        <li><i class="icon-phone2"></i>+255 672 986 483</li>
                        <li><i class="icon-mail"></i><a href="">morogoromc@gmail.com</a></li>
                        <li><i class="icon-globe2"></i><a href="http://morogoromc.go.tz/">morogoromc.go.tz</a></li>
                    </ul>
                </div>
                {{-- Our Address layout end here --}}
                
       
                <div class="col-md-6">
                    <div class="row">
                        {{-- session message start here --}}
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @endif
                        {{-- session message End here --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">
                                     {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="alert alert-danger">
                                 {{$message}}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
                                @error('message')
                                <div class="alert alert-danger">
                                 {{$message}}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary btn-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection