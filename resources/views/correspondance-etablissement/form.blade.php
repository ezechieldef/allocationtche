<script>
    function arrange() {
        var univ_select = document.getElementById("sel-univ");
        var univ_v = univ_select.options[univ_select.selectedIndex].value;

        var ets_select = document.getElementById("champ1");
        var ets_v = ets_select.options[ets_select.selectedIndex].value;
        var ets_select2 = document.getElementById("champ2");
        var ets_v2 = ets_select2.options[ets_select.selectedIndex].value;



        //console.log(univ_select.options);
        //enfant


        if (ets_select.options[ets_select.selectedIndex].getAttribute("parent") != univ_v) {
            ets_select.value = '';

            // document.getElementById('filiere_acc_id').value = '';
        }
        if (ets_select2.options[ets_select2.selectedIndex].getAttribute("parent") != univ_v) {
            ets_select2.value = '';

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
        for (var i = 0; i < ets_select2.options.length; i++) {
            //console.log(ets_select.options[i]);
            if (ets_select2.options[i].getAttribute("parent") != univ_v) {
                ets_select2.options[i].setAttribute("hidden", '');
            } else {
                ets_select2.options[i].removeAttribute("hidden");
            }
        }


    }

    function change(v) {
        document.getElementById('filiere_acc_id').value = v.value;

    }
    function filsel(v) {
        document.getElementById('champ2').value='';
        document.querySelectorAll("#champ2 option").forEach(opt => {
            if (opt.value == v) {
                opt.disabled = true;
            }else{
                opt.disabled = false;
            }
        });
    }
</script>

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
<div class="col-12">
    {!! $errors->first('champ1', '<div class="alert alert-danger">:message</div>') !!}
    {!! $errors->first('champ2', '<div class="alert alert-danger">:message</div>') !!}

</div>
        <div class="col-12 form-group mb-3">
            {{ Form::label('Universités') }}
            {{ Form::select('universite', \App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), null, [
                'id' => 'sel-univ',
                'class' => 'form-select ' . ($errors->has('universite') ? ' is-invalid' : ''),
                'placeholder' => '-- Séletionner --',
                'onchange' => 'arrange();',
            ]) }}
        </div>

        <div class="col-md-6 col-12">

                {{ Form::label('Etablissement ') }}
                <select id="champ1" name="champ1" class="form-select" onchange="filsel(this.value);" value="{{ $correspondanceEtablissement->champ1 }}">
                    <option value=""> -- Sélectionner -- </option>
                    @foreach (\App\Models\Etablissement::all() as $an)
                        <option value="{{ $an->CodeEtablissement }}" parent='{{ $an->CodeUniversite }}' hidden>
                            {{ $an->LibelleEtablissement }} </option>
                    @endforeach
                </select>

        </div>

        <div class="col-md-6 col-12">

                {{ Form::label('Correspond à') }}
                <select id="champ2" name="champ2" class="form-select" value="{{ $correspondanceEtablissement->champ2 }}">
                    <option value=""> -- Sélectionner -- </option>
                    @foreach (\App\Models\Etablissement::all() as $an)
                        <option value="{{ $an->CodeEtablissement }}" parent='{{ $an->CodeUniversite }}' hidden>
                            {{ $an->LibelleEtablissement }} </option>
                    @endforeach
                </select>




        </div>
    </div>

{{--
        <div class="form-group">
            {{ Form::label('champ1') }}
            {{ Form::text('champ1', $correspondanceEtablissement->champ1, [ 'id'=>'champ1', 'class' => 'form-control' . ($errors->has('champ1') ? ' is-invalid' : ''), 'placeholder' => 'Champ1']) }}
            {!! $errors->first('champ1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('champ2') }}
            {{ Form::text('champ2', $correspondanceEtablissement->champ2, ['id'=>'champ2','class' => 'form-control' . ($errors->has('champ2') ? ' is-invalid' : ''), 'placeholder' => 'Champ2']) }}
            {!! $errors->first('champ2', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt20 mt-3 text-center">
        <button type="submit" class="btn btn-info px-4 text-white text-bold">Soumettre</button>
    </div>
</div>
