<script>
    function arrange() {
        var univ_select = document.getElementById("sel-univ");
        var univ_v = univ_select.options[univ_select.selectedIndex].value;

        var ets_select = document.getElementById("CodeEtablissement1");
        var ets_v = ets_select.options[ets_select.selectedIndex].value;
        var ets_select2 = document.getElementById("etablissementSelection");
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
        document.getElementById('etablissementSelection').value = '';
        document.querySelectorAll("#etablissementSelection option").forEach(opt => {
            if (opt.value == v) {
                opt.disabled = true;
            } else {
                opt.disabled = false;
            }
        });
    }
</script>

<div class="box box-info padding-1">
    <div class="box-body">
        <form method="POST" action="{{ route('correspondance-ets-selection.store') }}" role="form"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    {!! $errors->first('CodeEtablissement1', '<div class="alert alert-danger">:message</div>') !!}
                    {!! $errors->first('etablissementSelection', '<div class="alert alert-danger">:message</div>') !!}

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
                    <select id="CodeEtablissement1" name="CodeEtablissement1" class="form-select"
                        onchange="filsel(this.value);" value="{{ $correspEtsSelection->CodeEtablissement1 }}">
                        <option value=""> -- Sélectionner -- </option>
                        @foreach (\App\Models\Etablissement::all() as $an)
                            <option value="{{ $an->CodeEtablissement }}" parent='{{ $an->CodeUniversite }}' hidden>
                                {{ $an->LibelleEtablissement }} </option>
                        @endforeach
                    </select>

                </div>

                <div class="col-md-6 col-12">

                    {{ Form::label('Correspond à') }}
                    <select id="etablissementSelection" name="etablissementSelection" class="form-select"
                        value="{{ $correspEtsSelection->etablissementSelection }}">
                        <option value=""> -- Sélectionner -- </option>
                        @foreach (Illuminate\Support\Facades\DB::select('SELECT distinct etablissementSelection, CodeUniversite from resultats') as $an)
                            <option value="{{ $an->etablissementSelection }}" parent='{{ $an->CodeUniversite }}'
                                hidden>
                                {{ $an->etablissementSelection }} </option>
                            {{-- <option value="{{ $an['etablissementSelection'] }}" parent='{{ $an['CodeUniversite'] }}'
                            hidden>
                            {{ $an['etablissementSelection'] }} </option> --}}
                        @endforeach
                    </select>

                </div>
            </div>
        </form>
        {{--
        <div class="form-group">
            {{ Form::label('CodeEtablissement1') }}
            {{ Form::text('CodeEtablissement1', $correspEtsSelection->CodeEtablissement1, [ 'id'=>'CodeEtablissement1', 'class' => 'form-control' . ($errors->has('CodeEtablissement1') ? ' is-invalid' : ''), 'placeholder' => 'CodeEtablissement1']) }}
            {!! $errors->first('CodeEtablissement1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('etablissementSelection') }}
            {{ Form::text('etablissementSelection', $correspEtsSelection->etablissementSelection, ['id'=>'etablissementSelection','class' => 'form-control' . ($errors->has('etablissementSelection') ? ' is-invalid' : ''), 'placeholder' => 'etablissementSelection']) }}
            {!! $errors->first('etablissementSelection', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt20 mt-3 text-center">
        <button type="submit" class="btn btn-info px-4 text-white text-bold">Soumettre</button>
    </div>
    <p class="my-5">
        <button class="btn btn-primary text-white text-bold w-100" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
            Liste des Etablissements de sélection, n'ayant pas de correspondance.
        </button>
    </p>
    <div class="collapse w-100" id="collapseExample2">
        <div class="table-responsive">
            <table class="table w-100" id="datatable">
                <thead>
                    <th>Université Sélection</th>
                    <th>Etablissement Sélection</th>
                    <th>Etablissement</th>
                </thead>
                <tbody>
                    @foreach (Illuminate\Support\Facades\DB::select('SELECT distinct R.etablissementSelection, R.universiteSelection , R.CodeUniversite from resultats R
                WHERE R.etablissementSelection NOT IN (SELECT C.etablissementSelection from corresp_ets_selection C ) ') as $sel)
                        <tr>
                            <td>{{ $sel->universiteSelection }}</td>
                            <td>{{ $sel->etablissementSelection }}</td>
                            <td>

                                <form method="POST" action="{{ route('correspondance-ets-selection.store') }}"
                                    role="form" enctype="multipart/form-data" class="d-flex">
                                    @csrf
                                    <input type="text" name="etablissementSelection"
                                        value="{{ $sel->etablissementSelection }}" class="hide">
                                    {{ Form::select(
                                        'CodeEtablissement1',
                                        App\Models\Etablissement::where('CodeUniversite', $sel->CodeUniversite)->pluck(
                                            'LibelleEtablissement',
                                            'CodeEtablissement',
                                        ),
                                        null,
                                        ['class' => 'form-select', 'placeholder' => '-- Sélectionner --', 'required' => 'required'],
                                    ) }}
                                    <button type="submit" class="btn btn-success btn-sm mx-3">Valider</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
