@extends('layouts.app')

@section('titre')
    Créer Derogation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Créer Derogation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('derogations.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('derogation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
