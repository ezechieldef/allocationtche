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
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Inscription</h4>

                                </div>
                            </div>
                            <div class="card-body">



                                <form method="POST" action="{{ route('register') }}" role="form" class="text-start">
                                    @csrf




                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label " for="email">Email</label>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label" for="password">Mot de passe</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password"
                                            {{-- pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*_=+-]).{8,12}$" --}}
                                            {{-- title="Doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un symbole ( ! @ # $ % ^ &amp; * _ = + - )" --}}
                                            minlength="8">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label" for="password-confirm">Confirmer Mot de passe</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            {{-- pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*_=+-]).{8,12}$" --}}
                                            {{-- title="Doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un symbole ( ! @ # $ % ^ &amp; * _ = + - )" --}}
                                            minlength="8">


                                    </div>




                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-success w-100 my-4 mb-2">S'inscrire</button>
                                    </div>
                                    <div class="d-flex justify-content-around align-items-center w-100">

                                        <div><a href="/login" class="mt-4 text-sm text-center">Avez vous déjà un compte
                                                ?</a></div>







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
