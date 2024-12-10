<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                /* text-align: center; */
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a href="{{ route('home.index') }}">Home</a>
                    <a href="{{ route('user.index') }}">User</a>
                    <a href="{{ route('group.index') }}">Group</a>
                    <a href="{{ route('index.form') }}">Check Input</a>
                        <a href="{{ route('logout') }}">Logout</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    PROJECT TEST
                </div>

                <div class="links">
                    <div class="card">
                        <div class="card-header">Results</div>

                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <td style="width: 20%">Input 1</td>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $input1 }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Input 2</td>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $input2 }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Matches</td>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $matches }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Character Matches</td>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $char_matches }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Percentage</td>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $percentage }}</td>
                                </tr>
                            </table>
                            <a href="{{ route('index.form') }}" class="btn btn-danger">Back to form</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


    </body>
</html>
