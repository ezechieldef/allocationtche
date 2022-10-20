@extends('auth.template')

@section('content')
    <main class="main-content  mt-0">
        <div class="page-header align-items-start ">

            <div class="container my-5 py-5">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Réinitialiser mot de
                                        passe
                                    </h4>

                                </div>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{ route('password.email') }}" role="form"
                                    class="text-start">
                                    @csrf

                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label " for="email">Email</label>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-success w-100 my-4 mb-2">Soumettre</button>

                                    </div>
                                    <div class="d-flex justify-content-around align-items-center w-100">

                                        <div><a href="{{ route('password.request') }}" class="mt-4 text-sm text-center">Mot
                                                de passe oublié ?</a></div>
                                        <div><label>|</label></div>
                                        <div><a href="{{ route('register') }}"
                                                class="text-info text-gradient font-weight-bold">S'inscrire</a></div>





                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DBAU</title>
    <link rel="stylesheet" href="{{ url('bsassets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('bsassets/css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ url('bsassets/css/Sidebar-1.css') }}">
    <link rel="stylesheet" href="{{ url('bsassets/css/Sidebar.css') }}">
    <link rel="stylesheet" href="{{ url('bsassets/css/styles.css') }}">
</head>

<body>

    <script src="{{ url('bsassets/js/jquery.min.js')}}"></script>
    <script src="{{ url('bsassets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html> --}}
