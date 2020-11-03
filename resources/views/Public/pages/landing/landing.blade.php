@extends('Public.layouts.default')

@section('content')
    
        <section class="public-pages-landing">
            <!-- <div class="overlay"></div> -->
            <div class="container hero-content">
                <div class="row justify-content-center">
                    <div class="col-md-6 landing-container">
                        <h1>Night Out Live</h1>
                        <p>
                            Find | Search | Live 
                        </p>
                        <div class="btn-group" role="group">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                                <a class="btn btn-light" href="{{ route('logout') }}"
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
        <section class="public-pages-howitworks">
            <div class="container">
                <h1>Three Simple Steps</h1>
                <div class="row steps-container">
                    <div class="col-md-6 about-column">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-phone-vibrate" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3H6a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM6 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H6z"/>
                            <path fill-rule="evenodd" d="M8 12a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM1.599 4.058a.5.5 0 0 1 .208.676A6.967 6.967 0 0 0 1 8c0 1.18.292 2.292.807 3.266a.5.5 0 0 1-.884.468A7.968 7.968 0 0 1 0 8c0-1.347.334-2.619.923-3.734a.5.5 0 0 1 .676-.208zm12.802 0a.5.5 0 0 1 .676.208A7.967 7.967 0 0 1 16 8a7.967 7.967 0 0 1-.923 3.734.5.5 0 0 1-.884-.468A6.967 6.967 0 0 0 15 8c0-1.18-.292-2.292-.807-3.266a.5.5 0 0 1 .208-.676zM3.057 5.534a.5.5 0 0 1 .284.648A4.986 4.986 0 0 0 3 8c0 .642.12 1.255.34 1.818a.5.5 0 1 1-.93.364A5.986 5.986 0 0 1 2 8c0-.769.145-1.505.41-2.182a.5.5 0 0 1 .647-.284zm9.886 0a.5.5 0 0 1 .648.284C13.855 6.495 14 7.231 14 8c0 .769-.145 1.505-.41 2.182a.5.5 0 0 1-.93-.364C12.88 9.255 13 8.642 13 8c0-.642-.12-1.255-.34-1.818a.5.5 0 0 1 .283-.648z"/>
                          </svg>
                    </div>
                    <div class="col-md-6 about-column">
                        <p>Turn on the app put the club you're going to or at</p>
                    </div>
                </div>
                <div class="row steps-container">
                    <div class="col-md-6 about-column">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7.5 1.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755S12 12 8 12s-5 1.755-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                          </svg>
                    </div>
                    <div class="col-md-6 about-column">
                        <p>Check and see who else is looking for someone</p>
                    </div>
                </div>
                <div class="row steps-container">
                    <div class="col-md-6 about-column">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-music" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                            <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                            <path fill-rule="evenodd" d="M9.757 5.67A1 1 0 0 1 11 6.64v1.75l-2 .5v3.61c0 .495-.301.883-.662 1.123C7.974 13.866 7.499 14 7 14c-.5 0-.974-.134-1.338-.377-.36-.24-.662-.628-.662-1.123s.301-.883.662-1.123C6.026 11.134 6.501 11 7 11c.356 0 .7.068 1 .196V6.89a1 1 0 0 1 .757-.97l1-.25z"/>
                          </svg>
                    </div>
                    <div class="col-md-6 about-column">
                        <p>Strike up a convo, connect and let the night ride!</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="public-pages-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-text-container">
                            <h1>Take control of your night</h1>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                when an unknown printer took a galley of type and scrambled it to make a type s
                                pecimen book.
                            </p>
                            <p>
                                It has survived not only five centuries, but also the leap into electronic 
                                typesetting, remaining essentially unchanged. It was popularised in the 1960s with the 
                                release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop 
                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image-container">
                            <img src="{{ asset('images/night-out.jpg')}}" class="img-fluid"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection