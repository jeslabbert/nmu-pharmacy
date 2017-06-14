<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background: url(../images/background.jpg) no-repeat;
                background-position: top;
                background-attachment: fixed;
                background-size: 100% 100%;
                background-size: cover;
                color: #FFFFFF;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                text-align: center;
                background-color: rgba(130,183,74,.85);
                padding: 20px;
                /*border-radius: 20px;*/
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            .title {
                font-size: 60px;
            }

            .title small {
                font-size: 32px;
            }

            .links > a {
                color: #ffff00;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
.m-b-links > a {
    color: #ffff00;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 24px;
}
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Nelson Mandela University<br /><small>Pharmacy Graduate Database</small>
                </div>
                <div class="title m-b-links">
                    @if (Auth::check())
                        <button><a href="{{ url('/home') }}">Home</a></button>
                    @else
                        <button><a href="{{ url('/login') }}">Login</a></button>
                        <button><a href="{{ url('/register') }}">Register</a></button>
                    @endif
                </div>

            </div>
        </div>
    </body>
</html>
