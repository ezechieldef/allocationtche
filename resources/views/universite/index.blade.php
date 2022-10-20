@extends('layouts.app')

@section('template_title')
    Universite
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Universite') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('universites.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Codeuniversite</th>
										<th>Libellelonguniversite</th>
										<th>Universiteactif</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($universites as $universite)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $universite->CodeUniversite }}</td>
											<td>{{ $universite->LibelleLongUniversite }}</td>
											<td>{{ $universite->UniversiteActif }}</td>

                                            <td>
                                                <form action="{{ route('universites.destroy',$universite->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('universites.show',$universite->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('universites.edit',$universite->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $universites->links() !!}
            </div>
        </div>
    </div>
@endsection
