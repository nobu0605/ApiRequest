<!doctype html>
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .error{
                color: red;
            }
            .success{
                color: green;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Welcome
                </div>

                <div class="links">
                    <span>画像ファイルパスを入力してください</span>
                    <form action='/index' method="post">
                        {{ csrf_field() }}
                        <input name="image_path" type='text'>
                        <input type='submit'>
                    </form>
                    @if (isset($error_message))
                        <span class="error">{{$error_message}}</span>
                    @endif
                    @if ($errors->any())
                        <div class="error">
                            @foreach ($errors->all() as $error)
                            <span class="help-block">{{ $error }}</span><br>
                            @endforeach
                        </div>
                    @endif
                    @if (isset($success))
                        <span class="success">{{$success}}</span>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
