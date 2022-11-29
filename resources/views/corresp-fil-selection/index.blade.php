@extends('layouts.app')

@section('template_title')
    Corresp Fil Selection
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Corresp Fil Selection') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('correspondance-fil-selection.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Nouveau
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
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Codefiliere</th>
										<th>Filiereselection</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($correspFilSelections as $correspFilSelection)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $correspFilSelection->CodeFiliere }}</td>
											<td>{{ $correspFilSelection->filiereSelection }}</td>

                                            <td>
                                                <form action="{{ route('correspondance-fil-selection.destroy',$correspFilSelection->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info text-white " href="{{ route('correspondance-fil-selection.show',$correspFilSelection->id) }}"><i class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <a class="btn btn-sm btn-success text-white" href="{{ route('correspondance-fil-selection.edit',$correspFilSelection->id) }}"><i class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm text-white show_confirm2"><i class="fa fa-fw fa-trash"></i> Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
