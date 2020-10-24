<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="auth-page">
    <div class="card" style="width: 25rem;">
        <div class="card-header">
            @yield('auth-type', 'Login')
        </div>
        <div class="card-body">
        <form method="POST" action={{ url("/".$page) }}>
                @csrf
                @if($page == 'register')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            @yield('auth-username', 'Username')
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="@yield('auth-username', 'Email')"
                        aria-label="@yield('auth-username', 'Email')" aria-describedby="basic-addon1" name="@yield('auth-username', 'Email')">
                </div>
                @endif
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            @yield('auth-type', 'Username')
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="@yield('auth-email', 'Email')"
                        aria-label="@yield('auth-email', 'Email')" aria-describedby="basic-addon1" name="@yield('auth-email', 'Email')">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@yield('auth-pass', 'Password')</span>
                    </div>
                    <input type="password" class="form-control" placeholder="@yield('auth-pass', 'Password')"
                        aria-label="@yield('auth-pass', 'Password')" aria-describedby="basic-addon1" name="@yield('auth-pass', 'Password')"/>
                </div>
                @if($page == 'register')
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Confirm Password</span>
                        </div>
                        <input type="password" class="form-control"
                            placeholder="Confirm Password"
                            name="@yield('auth-pass-confirm', 'password_confirmation')"
                            aria-label="Confirm Password"
                            aria-describedby="basic-addon1" />
                    </div>
                @endif
                <div>
                    <button class="card-link btn btn-light" role="button">
                        Cancel
                    </button>
                    <button class="card-link btn btn-primary" role="button" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
