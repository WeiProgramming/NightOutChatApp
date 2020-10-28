@extends('Public.layouts.default')

@section('content')
    
        <section class="public-pages-landing">
            <div class="container hero-content">
                <div class="row justify-content-center">
                    <div class="col-md-6 ">
                        <p>
                            Find your friend | Live for the night
                        </p>
                        <div class="btn-group" role="group">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
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
                    </div>
                </div>
            </div>
        </section>
        <section class="public-pages-about">
            <div class="container">
                <h1>Take control of your night</h1>
                <p>
                    Strike up a conversation or approach that
                    person you've been eyeing all night digitally.
                </p>
            </div>
        </section>
        <section class="public-pages-howitworks">
            <div class="container">
                <h1>Three Simple Steps</h1>
                <div class="row">
                    <div class="col-md-6">Time</div>
                    <div class="col-md-6">
                        <p>Turn on the app put the club you're going to or at</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">Time</div>
                    <div class="col-md-6">
                        <p>CHeck and see who else is looking for someone</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">Time</div>
                    <div class="col-md-6">
                        <p>Strike up a convo, connect and let the night ride!</p>
                    </div>
                </div>
            </div>
        </section>
@endsection