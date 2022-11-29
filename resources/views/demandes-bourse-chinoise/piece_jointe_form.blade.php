<h4 class="mt-3">Pièces Jointe</h4>


@if (count(App\Models\PieceJointeChine::whereNotIn(
        'id',
        \App\Models\AssocPJChine::where('demande_id', $demandesBourseChinoise->id)->get(['piece_jointe'])->toArray())->get()) > 0)
    <div class="alert alert-info mt-4">
        <strong>Astuce : </strong> Vous pouvez utiliser l'application <strong>CamScanner</strong>
        pour scanner les documents plus facilement. <a
            href="https://play.google.com/store/apps/details?id=com.intsig.camscanner&hl=fr&gl=US"
            target="_blank">Télécharger
            sur Playstore</a>
    </div>
@else
    <a href="/pdf-bourse-chine/{{ $demandesBourseChinoise->id }}">
        <div class="alert alert-success">
            <i class="fa fa-download " style="margin-right : 3px"></i> Télécharger fiche
            d'inscription
        </div>
        <div class="text-danger"><strong>Attention :</strong> Une fois télécharger, plus aucune
            correction ou modification n'est possible pour votre demande </div>
    </a>
@endif

<ul class="list-group  mt-3 mb-2" id="uil">

    @forelse (App\Models\PieceJointeChine::all() as $pj)
        {{-- @forelse ($demandesBourseChinoise->pieceJointes() as $pj) --}}
        @php
            $assocPJdemande = $demandesBourseChinoise->pjID($pj->id)->first() ?? null;
            // $lien_doc = $assocPJdemande == null ? null : $assocPJdemande->where('user_id', $demandesBourseChinoise->id)->first();
        @endphp

        <li class="list-group-item">
            @if ($assocPJdemande == null)
                @role('super-admin')
                    <div class="d-flex align-items-center ">

                        <i class="fa-solid fa-circle-xmark text-danger" style="font-size:25px; margin-right: 10px"></i>

                        <strong> {{ $pj->nom_pj }}</strong>

                    </div>
                @else
                    <form method="POST"
                        action="{{ route('demandes-bourse-chinoise.update', $demandesBourseChinoise->id) }}" role="form"
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

                        <a href="{{ Storage::url($assocPJdemande->url) }}" target="_blank">
                            <button class="btn btn-info text-white btn-sm mx-3" style="pointer-events: none"><i
                                    class="fa fa-fw fa-eye"></i>
                                <strong>Voir</strong></button></a>

                        @if (!$assocPJdemande->isConfirmed)
                            @role('super-admin')
                            <form method="POST"
                            action="{{ route('demandes-bourse-chinoise.update', $demandesBourseChinoise->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}


                                    <input type="text" class="hide" name="pj_conf_id"
                                        value="{{ $assocPJdemande->id }}">
                                    @csrf
                                    <button class="btn btn-success text-white btn-sm mx-3 show_confirm" type="submit"><i
                                            class="fa fa-check"></i>
                                        <strong>Confirmer</strong></button>
                                </form>
                            @else
                            <form method="POST"
                            action="{{ route('demandes-bourse-chinoise.update', $demandesBourseChinoise->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}


                                    <input type="text" class="hide" name="delete_pj"
                                        value="{{ $assocPJdemande->id }}">
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
