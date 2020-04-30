<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Proxy Tester</title>
</head>
<body>

<div class="container">

    <hr>

    <h1>Proxy Tester</h1>

    <hr>

    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-sm-7">

                    <div class="card border-dark">
                        <div class="card-body">


                            {!! Form::open(['url' => 'lookup']) !!}

                            <div class="form-group">
                                {{ Form::url('url', null, ['class' => 'form-control', 'placeholder' => 'Enter the URL', 'required']) }}
                            </div>

                            <h4>Proxy Options</h4>

                            <div class="form-group row">
                                <div class="col-sm-8">
                                    {{ Form::text('proxy_ip', null, ['class' => 'form-control', 'placeholder' => 'Proxy IP Address', 'required']) }}
                                </div>
                                <div class="col-sm">
                                    {{ Form::number('proxy_port', null, ['class' => 'form-control', 'placeholder' => 'Port', 'required']) }}
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-6">
                                    {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
                                </div>
                                <div class="col-sm-6">
                                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Start Test</button>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
                <div class="col-sm">
                    @if($errors->any() && $errors->first())
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    @if(session('time') && session('code'))
                        <div class="d-flex align-items-center  justify-content-center text-center" style="height: 100%; width: 100%;">
                            <div>
                                {{ session('code') }}
                                <h1>{{ round(session('time'), 2) }}s</h1>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>