<h4 class="mt-3">Pièces Jointe</h4>
<ul class="list-group  mt-3 mb-2" id="uil">

    @forelse (App\Models\PieceJointeUser::all() as $pj)
    {{-- @forelse ($user->pieceJointes() as $pj) --}}
        @php
            $assocPjUser = $user->pjID($pj->id)->first() ?? null;
            $lien_doc = $assocPjUser == null ? null : $assocPjUser->where('user_id', $user->id)->first();
        @endphp

        <li class="list-group-item">
            @if ($assocPjUser == null)
                @role('super-admin|admin-SAUA')
                    <div class="d-flex align-items-center ">

                        <i class="fa-solid fa-circle-xmark text-danger" style="font-size:25px; margin-right: 10px"></i>

                        <strong> {{ $pj->nom_pj }}</strong>

                    </div>
                @else
                    <form method="POST" action="{{ route('utilisateur.update', $user->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        <input type="text" name="{{ $pj->nom_pj }}_id" class="form-control hide"
                            value="{{ $pj->id }}" id="">
                        <div class="form-group">
                            {{ Form::label($pj->description) }}
                            {{ Form::file($pj->nom_pj, ['accept' => 'application/pdf', 'class' => 'form-control form-file-sub is-invalid ', 'placeholder' => 'Nom de la personne à contacter']) }}
                            <div class="invalid-feedback">Fichier manquant</div>
                            {!! $errors->first($pj->nom_pj, '<div class="invalid-feedback">:message</div>') !!}

                        </div>

                    </form>
                @endrole
            @else
                <div class="d-flex align-items-center justify-content-between">
                    <span class="d-flex ">
                        <i class="fa-solid fa-circle-check text-success" style="font-size:25px; margin-right: 10px"></i>
                        <strong> {{ $pj->nom_pj }}</strong>
                    </span>
                    <span class="d-flex">

                        <a href="{{ Storage::url($lien_doc->url) }}" target="_blank">
                            <button class="btn btn-info text-white btn-sm mx-3" style="pointer-events: none"><i
                                    class="fa fa-fw fa-eye"></i>
                                <strong>Voir</strong></button></a>

                        @if (!$assocPjUser->isConfirmed)
                            @role('super-admin|admin-SAUA')
                                <form method="POST" action="{{ route('utilisateur.update', $user->id) }}" role="form"
                                    enctype="multipart/form-data">
                                    {{ method_field('PATCH') }}
                                    <input type="text" class="hide" name="pj_conf_id" value="{{ $assocPjUser->id }}">
                                    @csrf
                                    <button class="btn btn-success text-white btn-sm mx-3 show_confirm" type="submit"><i
                                            class="fa fa-check"></i>
                                        <strong>Confirmer</strong></button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('utilisateur.update', $user->id) }}" role="form"
                                    enctype="multipart/form-data">
                                    {{ method_field('PATCH') }}
                                    <input type="text" class="hide" name="delete_val" value="{{ $pj->id }}">
                                    <input type="text" class='hide' name="delete" value="oui">
                                    @csrf
                                    <button class="btn btn-danger text-white btn-sm mx-3 show_confirm2" type="submit"><i
                                            class="fa fa-trash"></i>
                                        <strong>Supprimer</strong></button>
                                </form>
                            @endrole
                        @endif

                    </span>

                </div>
            @endif

        </li>
    @empty
        ---
    @endforelse

</ul>
