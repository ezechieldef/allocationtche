@extends('layouts.app')


@section('titre')
    Détail Profile
@endsection

@section('titre')
    {{ $user->name ?? 'Détail Utilisateur' }}
@endsection
@section('sous-titre')
    Information du profile
@endsection

@section('content')
    <section class="content container-fluid ">


        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail de l'utilisateur</span>
                        </div>

                        <div class="float-right">
                            {{-- @role('super-admin')
                                @if ($user->active == 0)
                                    <a class="btn btn-warning text-dark" href="/profile-toggle/{{ $user->id }}"> Activer le
                                        compte</a>
                                @else
                                    <a class="btn  btn-warning text-dark" href="/profile-toggle/{{ $user->id }}"> Désactiver
                                        le
                                        compte</a>
                                @endif
                            @endrole --}}

                            <a class="btn btn-warning text-dark" href="{{ route('utilisateur.index') }}"> Retour</a>

                        </div>


                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-md-6 mb-2">
                                <label>Nom & Prénoms </label>
                                <div class=" bg-gray-200 px-3 pt-2 pb-2" style="border-radius: 4px; ">
                                    {{ $user->name }}
                                </div>
                            </div>

                            <div class="col-12 col-md-6 mb-2 ">
                                <label>Email </label>
                                <div class=" bg-gray-200 px-3 pt-2 pb-2" style="border-radius: 4px; ">
                                    {{ $user->email }}
                                </div>
                            </div>
                            @if (in_array('banquier', $user->getRoleNames()->toArray()))
                                <div class="col-12 col-md-4 mb-2">
                                    <label>Banque Assigner </label>
                                    <div class=" bg-gray-200 px-3 pt-2 pb-2" style="border-radius: 4px; ">
                                        {{ \App\Models\Banque::find($user->banque_assigner)->LibellelongBanque }}
                                    @empty($user->banque_assigner)
                                        -
                                    @endempty
                                </div>
                            </div>
                        @endif


                        {{-- <div class="col-12 my-3">

                                <div class="d-flex align-items-center">
                                    @if ($user->npi_url != '')

                                        <i class="fa-solid fa-circle-check text-success"
                                            style="font-size:25px; margin-right: 10px"></i>
                                    @else

                                        <i class="fa-solid fa-circle-xmark text-danger"
                                            style="font-size:25px; margin-right: 10px"></i>
                                    @endif

                                    CIP Scannée au format PDF


                                    @if ($user->npi_url != '')
                                        <a href="{{ Storage::url($user['npi_url']) }}" target="_blank">
                                            <button class="btn btn-info text-white btn-sm mx-3"
                                                style="pointer-events: none"><i class="fa fa-fw fa-eye"></i>
                                                <strong>Voir</strong></button></a>
                                    @endif
                                </div>

                            </div>
                             --}}
                        {{-- <div class="col-12">
                                @include('user.piece_jointe_form')
                            </div> --}}

                        <div class="col-12 mt-3 " style="text-align: right; ">
                            <a class=" btn btn-success text-light mx-auto" style="font-weight: 700"
                                href="{{ route('utilisateur.edit', $user->id) }}">
                                Editer Profile</a>

                        </div>
                    </div>

                    @if (in_array(
                        'super-admin',
                        Auth::user()->getRoleNames()->toArray()))
                        <strong>Roles </strong>
                        <form action="/permission/{{ $user->id }}" method="post">
                            @csrf
                            <ul class="list-group list-group-flush mt-3 mb-2" id="uil">
                                @foreach (\Spatie\Permission\Models\Role::all()->pluck('name') as $role )
                                <li class="list-group-item">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" onchange="unhide()" type="checkbox"
                                            name="btn-{{ $role }}" id=""
                                            @if (in_array($role, $user->getRoleNames()->toArray())) checked @endif>
                                        <label class="form-check-label mb-0 ms-3 text-capitalize" for="rememberMe">{{ $role }}</label>
                                    </div>
                                </li>
                                @endforeach


                                <button type="submit" id="sub"
                                    class="btn btn-success text-white font-bold hide">Sauvegarder</button>
                            </ul>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function unhide() {
        document.getElementById('sub').classList.remove('hide');
    }
</script>
@endsection
