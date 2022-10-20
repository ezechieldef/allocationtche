@extends('layouts.app')

@section('template_title')
    Update Inscriptionuniversite2021
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Inscriptionuniversite2021</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('inscriptionuniversite2021s.update', $inscriptionuniversite2021->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('inscriptionuniversite2021.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
