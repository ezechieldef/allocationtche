@extends('layouts.app')

@section('titre')
    Modifier Derogation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Modifier Derogation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('derogations.update', $derogation->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('derogation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
