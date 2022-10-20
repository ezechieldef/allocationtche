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

    function change(v) {
        document.getElementById('filiere_acc_id').value = v.value;

    }
</script>

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{ Form::label('Universités') }}
                    {{ Form::select('universite', \App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), null, [
                        'id' => 'sel-univ',
                        'class' => 'form-select  ' . ($errors->has('universite') ? ' is-invalid' : ''),
                        'placeholder' => '-- Séletionner --',
                        'onchange' => 'arrange();',
                    ]) }}

                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{ Form::label('Etablissement ') }}
                    <select id="sel-ets" class="form-select" onchange="arrange()">
                        <option value=""> -- Sélectionner -- </option>
                        @foreach (\App\Models\Etablissement::all() as $an)
                            <option value="{{ $an->CodeEtablissement }}" parent='{{ $an->CodeUniversite }}' hidden>
                                {{ $an->LibelleEtablissement }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-12 col-12">
                <div class="form-group">
                    {{ Form::label('Filière ') }}

                    <select id="sel-fil" class="form-select " onchange="change(this)" name="champ1">
                        <option value=""> --Sélectionner -- </option>
                        @foreach (\App\Models\Filiere::all() as $an)
                            <option value="{{ $an->CodeFiliere }}" parent='{{ $an->CodeEtablissement }}' hidden>
                                {{ $an->LibelleFiliere }} </option>
                        @endforeach
                    </select>
                    <input type="text" id="filiere_acc_id" name="filiere_acc_id" class="hide">
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="form-group">
                    {{ Form::label('Correspond à (Synonyme) : ') }}

                    <select id="sel-fil2" class="form-select" onchange="change(this)" name="champ2">
                        <option value=""> --Sélectionner -- </option>

                        @foreach (\App\Models\Filiere::all() as $an)
                            <option value="{{ $an->CodeFiliere }}" parent='{{ $an->CodeEtablissement }}' hidden>
                                {{ $an->LibelleFiliere }} </option>
                        @endforeach
                    </select>
                    <input type="text" id="filiere_acc_id" name="filiere_acc_id" class="hide">
                </div>
            </div>
            {{-- <div class="form-group">
                {{ Form::label('champ1') }}
                {{ Form::text('champ1', $correspondanceFiliere->champ1, ['id'=>"filiere_acc_id",'class' => 'form-control' . ($errors->has('champ1') ? ' is-invalid' : ''), 'placeholder' => 'Champ1']) }}
                {!! $errors->first('champ1', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('champ1') }}
            {{ Form::text('champ1', $correspondanceFiliere->champ1, ['class' => 'form-control' . ($errors->has('champ1') ? ' is-invalid' : ''), 'placeholder' => 'Champ1']) }}
            {!! $errors->first('champ1', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('champ2') }}
            {{ Form::text('champ2', $correspondanceFiliere->champ2, ['class' => 'form-control' . ($errors->has('champ2') ? ' is-invalid' : ''), 'placeholder' => 'Champ2']) }}
            {!! $errors->first('champ2', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt20 text-center">
        <button type="submit" class="btn btn-info text-bold text-white px-4">Soumettre</button>
    </div>
</div>
