<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <script>
                function arrange() {
                    var univ_select = document.getElementById("sel-univ");
                    var univ_v = univ_select.options[univ_select.selectedIndex].value;

                    var ets_select = document.getElementById("sel-ets");
                    var ets_v = ets_select.options[ets_select.selectedIndex].value;

                    var fil_select = document.getElementById("sel-fil");
                    var fil_v = fil_select.options[fil_select.selectedIndex].value;
                    var fil_select2 = document.getElementById("sel-fil2");
                    var fil_v2 = fil_select2.options[fil_select2.selectedIndex].value;

                    //console.log(univ_select.options);
                    //enfant


                    if (ets_select.options[ets_select.selectedIndex].getAttribute("parent") != univ_v) {
                        ets_select.value = '';
                        fil_select.value = '';
                        fil_select2.value = '';
                        // document.getElementById('filiere_acc_id').value = '';
                    }
                    for (var i = 0; i < ets_select.options.length; i++) {
                        //console.log(ets_select.options[i]);
                        if (ets_select.options[i].getAttribute("parent") != univ_v) {
                            ets_select.options[i].setAttribute("hidden", '');
                        } else {
                            ets_select.options[i].removeAttribute("hidden");
                        }
                    }

                    //sous enfant

                    if (fil_select.options[fil_select.selectedIndex].getAttribute("parent") != ets_v) {
                        fil_select.value = '';
                    }
                    if (fil_select2.options[fil_select2.selectedIndex].getAttribute("parent") != ets_v) {
                        fil_select2.value = '';
                    }
                    for (var i = 0; i < fil_select.options.length; i++) {

                        if (fil_select.options[i].getAttribute("parent") != ets_v) {
                            fil_select.options[i].setAttribute("hidden", '');
                        } else {
                            fil_select.options[i].removeAttribute("hidden");
                        }
                    }
                    for (var i = 0; i < fil_select2.options.length; i++) {

                        if (fil_select2.options[i].getAttribute("parent") != ets_v) {
                            fil_select2.options[i].setAttribute("hidden", '');
                        } else {
                            fil_select2.options[i].removeAttribute("hidden");
                        }
                    }
                }

                function dip_base_change(dip_value) {
                    var b_fields = document.getElementById('bac_fields');
                    var nb_fields = document.getElementById('non_bac_fields');
                    if (dip_value == 'BAC') {
                        b_fields.classList.remove('hide');
                        $("#bac_fields :input").removeAttr("disabled");
                        //b_fields.removeAttribute('disabled','disabled');

                        nb_fields.classList.add('hide');
                        nb_fields.setAttribute('disabled', 'disabled');
                        $("#non_bac_fields :input").attr("disabled", true);
                    } else {
                        nb_fields.classList.remove('hide');
                        //nb_fields.removeAttribute('disabled','disabled');
                        $("#non_bac_fields :input").removeAttr("disabled");

                        b_fields.classList.add('hide');
                        //b_fields.setAttribute('disabled','disabled');
                        $("#bac_fields :input").attr("disabled", true);
                    }
                    var nivo = document.getElementById('niveau_sollicite');
                    var filiere_choisi = document.getElementById('filiere_choisi');
                    //var filiere = document.getElementById('niveau_sollicite');
                    var n_possible = ""
                    switch (dip_value) {
                        case 'BAC':
                            n_possible = 'LICENCE';
                            break;
                        case 'LICENCE':
                            n_possible = 'MASTER';
                            break;
                        case 'MASTER':
                            n_possible = 'DOCTORAT';
                            break;
                        case 'DOCTORAT':
                            n_possible = 'SPECIALISATION';
                            break;

                        default:
                            break;
                    }
                    nivo.value = n_possible;

                    for (var i = 0; i < nivo.options.length; i++) {

                        if (nivo.options[i].value != n_possible) {
                            nivo.options[i].setAttribute("disabled", '');
                        } else {
                            nivo.options[i].removeAttribute("disabled");
                        }
                    }

                    for (var i = 0; i < filiere_choisi.options.length; i++) {

                        if (filiere_choisi.options[i].getAttribute("niveau") != n_possible) {
                            filiere_choisi.options[i].setAttribute("disabled", '');
                        } else {
                            filiere_choisi.options[i].removeAttribute("disabled");

                        }
                    }

                }
            </script>
            <div class=" hide">
                {{ Form::label('user_id') }}
                {{ Form::text('user_id', Auth::user()->id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
                {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <fieldset>
                <legend>Information Personnel</legend>
                <div class="row">
                    <div class="col-md-3 col-12 my-2">
                        <strong class="text-dark"> <label for="NPI">Num??ro Personnel d'Identification ( NPI
                                )</label></strong>
                        {{ Form::text('NPI', $demandesBourseChinoise->date_naissance, ['class' => 'form-control' . ($errors->has('npi') ? ' is-invalid' : ''), 'placeholder' => 'NPI']) }}
                        {!! $errors->first('NPI', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-md-4 col-12 my-2">
                        <strong class="text-dark"> {{ Form::label('nom') }}</strong>
                        {{ Form::text('nom', $demandesBourseChinoise->nom, ['class' => 'form-control text-uppercase ' . ($errors->has('nom') ? ' is-invalid' : ''), 'placeholder' => 'Nom']) }}
                        {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-5 col-12 my-2">
                        <strong class="text-dark">{{ Form::label('prenoms') }} </strong>
                        {{ Form::text('prenoms', $demandesBourseChinoise->prenoms, ['class' => 'form-control text-capitalize' . ($errors->has('prenoms') ? ' is-invalid' : ''), 'placeholder' => 'Prenoms']) }}
                        {!! $errors->first('prenoms', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-3 col-12 my-2">
                        <strong class="text-dark">
                            <label for="date_naissance">Date de naissance</label> </strong>
                        {{ Form::date('date_naissance', $demandesBourseChinoise->date_naissance, ['class' => 'form-control' . ($errors->has('date_naissance') ? ' is-invalid' : ''), 'placeholder' => 'Date Naissance']) }}
                        {!! $errors->first('date_naissance', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-3 col-12 my-2">
                        <strong class="text-dark"> <label for="lieu_naissance">Lieu de naissance</label> </strong>

                        {{ Form::text('lieu_naissance', $demandesBourseChinoise->lieu_naissance, ['class' => 'form-control' . ($errors->has('lieu_naissance') ? ' is-invalid' : ''), 'placeholder' => 'Lieu Naissance']) }}
                        {!! $errors->first('lieu_naissance', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-2 col-12 my-2">
                        <strong class="text-dark">{{ Form::label('sexe') }} </strong>
                        {{ Form::select('sexe', ['M' => 'Masculin', 'F' => 'F??minin'], $demandesBourseChinoise->sexe, ['class' => 'form-select' . ($errors->has('sexe') ? ' is-invalid' : ''), 'placeholder' => '-- S??lectionner --']) }}
                        {!! $errors->first('sexe', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Diplome de base</legend>
                <div class="row">
                    <div class="col-md-4 col-12 my-2">
                        <strong class="text-dark"> {{ Form::label('diplome_de_base') }} </strong>
                        {{ Form::select('diplome_de_base', ['BAC' => 'Baccalaur??at', 'LICENCE' => 'LICENCE', 'MASTER' => 'MASTER', 'DOCTORAT' => 'DOCTORAT'], $demandesBourseChinoise->diplome_de_base, ['class' => 'form-select' . ($errors->has('diplome_de_base') ? ' is-invalid' : ''), 'placeholder' => '-- S??lectionner --', 'onchange' => 'dip_base_change(this.value)']) }}
                        {!! $errors->first('diplome_de_base', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-4 col-12 my-2 @if ($demandesBourseChinoise->diplome_de_base != 'BAC') @else hide @endif"
                        id="non_bac_fields">
                        <strong class="text-dark"> {{ Form::label('filiere_du_diplome_de_base') }} </strong>
                        {{ Form::text('serie_ou_filiere', $demandesBourseChinoise->serie_ou_filiere, ['class' => 'form-control' . ($errors->has('serie_ou_filiere') ? ' is-invalid' : ''), 'placeholder' => 'Serie Ou Filiere', 'id' => 'base_non_bac']) }}
                        {!! $errors->first('serie_ou_filiere', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-4 col-12 my-2 @if ($demandesBourseChinoise->diplome_de_base != 'BAC') hide @else @endif"
                        id="bac_fields">
                        <strong class="text-dark"> {{ Form::label('serie_du_baccalaur??at') }} </strong>
                        {{ Form::select(
                            'serie_ou_filiere',
                            [
                                'A1' => 'A1',
                                'A2' => 'A2',
                                'B' => 'B',
                                'C' => 'C',
                                'D' => 'D',
                                'F1' => 'F1',
                                'F2' => 'F2',
                                'F3' => 'F3',
                                'F4' => 'F4',
                                'G1' => 'G1',
                                'G2' => 'G2',
                                'G3' => 'G3',
                                'Autre'=>'Autre'
                            ],
                            $demandesBourseChinoise->serie_ou_filiere,
                            [
                                'class' => 'form-select' . ($errors->has('serie_ou_filiere') ? ' is-invalid' : ''),
                                'placeholder' => '-- S??lectionner --',
                                'id' => 'base_bac',
                            ],
                        ) }}
                        {!! $errors->first('serie_ou_filiere', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-3 col-12 my-2">
                        <strong class="text-dark">
                            <label for="annee_obtention_bac">Ann??e d'obtention </label>
                        </strong>
                        @php
                            $ans = [];
                            for ($i = date('Y'); $i >= 2000; $i--) {
                                $ans[$i] = $i;
                            }
                        @endphp
                        {{ Form::select('annee_obtention_bac', $ans, $demandesBourseChinoise->annee_obtention_bac, ['class' => 'form-select' . ($errors->has('annee_obtention_bac') ? ' is-invalid' : ''), 'placeholder' => '-- S??lectionner --']) }}
                        {!! $errors->first('annee_obtention_bac', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-3 col-12 my-2">
                        <strong>
                            <label for="moyenne_au_bac">Moyenne du diplome</label>
                        </strong>

                        {{ Form::number('moyenne_bac', $demandesBourseChinoise->moyenne_bac, ['step' => '0.01', 'min' => '0', 'max' => '20', 'class' => 'form-control' . ($errors->has('moyenne_bac') ? ' is-invalid' : ''), 'placeholder' => 'Moyenne Bac']) }}
                        {!! $errors->first('moyenne_bac', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-4 col-12 my-2">
                        <strong>
                            <label for="moyenne_au_bac">Mention du diplome</label>
                        </strong>
                        {{ Form::select('mention', ['Passable' => 'Passable', 'Assez-bien' => 'Assez-bien', 'Bien' => 'Bien', 'Tres-bien' => 'Tr??s-bien', 'Excellent' => 'Excellent'], $demandesBourseChinoise->mention, ['class' => 'form-control' . ($errors->has('mention') ? ' is-invalid' : ''), 'placeholder' => '-- S??lectionner --']) }}
                        {!! $errors->first('mention', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Niveau & Fili??re sollicit??</legend>
                <div class="row">
                    <div class="col-md-4 col-12 my-2">
                        <strong class="text-dark"> {{ Form::label('niveau_sollicit??') }} </strong>
                        {{-- {{ Form::select('niveau_sollicite', ['LICENCE' => 'LICENCE', 'MASTER' => 'MASTER', 'DOCTORAT' => 'DOCTORAT', 'SPECIALISATION' => 'SPECIALISATION'], $demandesBourseChinoise->filiere_choisi, ['class' => 'form-select' . ($errors->has('niveau_sollicite') ? ' is-invalid' : ''), 'placeholder' => '-- S??lectionner --']) }} --}}

                        <select class="form-select" id="niveau_sollicite" name="niveau_sollicite">
                            <option selected="selected" value="">-- S??lectionner --</option>
                            @foreach (['LICENCE' => 'LICENCE', 'MASTER' => 'MASTER', 'DOCTORAT' => 'DOCTORAT', 'SPECIALISATION' => 'SPECIALISATION'] as $key => $fil)
                                <option value="{{ $key }}" disabled>{{ $fil }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('niveau_sollicite', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-4 col-12 my-2">
                        <strong class="text-dark"> {{ Form::label('filiere_choisi') }} </strong>
                        <select class="form-select" id="filiere_choisi" name="filiere_choisi">
                            <option selected="selected" value="">-- S??lectionner --</option>
                            @foreach ($demandesBourseChinoise->listeFiliere() as $fil)
                                <option value="{{ $fil['code'] }}" niveau="{{ $fil['niveau'] }}"
                                    base="{{ $fil['base'] }}" disabled>{{ $fil['libelle'] }}</option>
                            @endforeach
                        </select>
                        {{-- {{ Form::select('filiere_choisi', $demandesBourseChinoise->listeFiliere(), $demandesBourseChinoise->filiere_choisi, ['class' => 'form-select' . ($errors->has('filiere_choisi') ? ' is-invalid' : ''), 'placeholder' => '-- S??lectionner --']) }} --}}
                        {!! $errors->first('filiere_choisi', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                </div>
            </fieldset>

            <fieldset>
                <legend>Autres Informations</legend>
                <div class="row">
                    <div class="col-md-4 col-12 my-2">
                        <strong class="text-dark"> {{ Form::label('status_bourse') }} </strong>
                        {{ Form::select('status_bourse', ['Oui' => 'Oui, je suis d??j?? boursier', 'Non' => 'Non, je ne suis pas boursier'], $demandesBourseChinoise->status_bourse, ['class' => 'form-control' . ($errors->has('status_bourse') ? ' is-invalid' : ''), 'placeholder' => '-- S??lectionner --']) }}
                        {!! $errors->first('status_bourse', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-3 col-12 my-2">
                        <strong class="text-dark"> {{ Form::label('contact_whatsapp') }} </strong>
                        {{ Form::text('contact_whatsapp', $demandesBourseChinoise->contact_whatsapp, ['maxlength' => '8', 'minlength' => '8', 'class' => 'form-control' . ($errors->has('contact_whatsapp') ? ' is-invalid' : ''), 'placeholder' => 'Contact Whatsapp']) }}
                        {!! $errors->first('contact_whatsapp', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-3 col-12 my-2">
                        <strong class="text-dark"> {{ Form::label('contact_parent') }}</strong>

                        {{ Form::text('contact_parent', $demandesBourseChinoise->contact_parent, ['maxlength' => '8', 'minlength' => '8', 'class' => 'form-control' . ($errors->has('contact_parent') ? ' is-invalid' : ''), 'placeholder' => 'Contact Parent']) }}
                        {!! $errors->first('contact_parent', '<div class="invalid-feedback">:message</div>') !!}
                    </div>


                </div>
            </fieldset>



        </div>
        <div class="box-footer mt-3">
            <button type="submit" class="btn btn-success text-bold text-white w-100">Soumettre</button>
        </div>
    </div>
</div>
