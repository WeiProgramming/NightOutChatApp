@extends('Internal.layouts.default')

@section('content')
        <section class="internal-pages-dashboard">
            <div class="container hero-content">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="btn-group" role="group">
                            @auth
                                <a href="{{ url('/chatify') }}" class="btn btn-primary">Dashboard</a>
                                <a class="btn btn-primary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="btn btn-warning">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-light">Register</a>
                                @endif
                            @endif
                        </div>
                        <div>
                            <h1>Places Near You {{$total}}</h1>
                        </div>
                        <div class="row">
                            @foreach($businesses as $business)
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <div class="business-container" style="background-image: url({{$business['image_url']}})">
                                        <div class="overlay"></div>
                                        <div class="business-content">
                                            <p>{{$business['name']}}</p>
                                            <a href="chatify/user/{{$business['id']}}" class="btn btn-primary">I'm Here</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection