@extends('layouts.app')

@section('template_title')
    Update Taux
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Taux</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('taux.update', $taux->CodeTaux) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('taux.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
