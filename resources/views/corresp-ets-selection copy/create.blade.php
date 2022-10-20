@extends('layouts.app')

@section('template_title')
    Create Corresp Ets Selection
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Corresp Ets Selection</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('correspondance-ets-selection.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('corresp-ets-selection.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
