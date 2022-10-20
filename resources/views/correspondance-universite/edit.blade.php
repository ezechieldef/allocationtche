@extends('layouts.app')

@section('template_title')
    Update Correspondance Universite
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Correspondance Universite</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('correspondance-universite.update', $correspondanceUniversite->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('correspondance-universite.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
