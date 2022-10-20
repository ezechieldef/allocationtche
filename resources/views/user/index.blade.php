@extends('layouts.app')


@section('titre')
    Utilisateurs
@endsection
@section('sous-titre')
    Administrateur
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Liste des Utilisateurs') }}
                            </span>


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
                                        <th>ID</th>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Npi</th>
                                        <th>Contact</th>
                                        <th>Roles</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>

                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->NPI }}</td>
                                            <td>{{ $user->contact }}</td>
                                            <td>{{ implode(' | ',$user->getRoleNames()->toArray()) }}</td>


                                            <td>
                                                <form action="{{ route('utilisateur.destroy', $user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('utilisateur.show', $user->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Voir</a>
                                                    {{-- <a class="btn btn-sm btn-success"
                                                        href="{{ route('utilisateur.edit', $user->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Modifier</a> --}}
                                                    {{-- @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm2"><i
                                                            class="fa fa-fw fa-trash"></i> Supprimer</button> --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
