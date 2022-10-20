<script>
    function arrange(noeud) {

        //var ets_select = noeud.getElementById("sel-ets");
        var ets_select = noeud.querySelector("#sel-ets");
        var ets_v = ets_select.options[ets_select.selectedIndex].value;

        //var fil_select = noeud.getElementById("sel-fil");
        var fil_select = noeud.querySelector("#sel-fil");
        var fil_v = fil_select.options[fil_select.selectedIndex].value;


        if (fil_select.options[fil_select.selectedIndex].getAttribute("parent") != ets_v) {
            fil_select.value = '';
        }

        for (var i = 0; i < fil_select.options.length; i++) {

            if (fil_select.options[i].getAttribute("parent") != ets_v) {
                fil_select.options[i].setAttribute("hidden", '');
            } else {
                fil_select.options[i].removeAttribute("hidden");
            }
        }

    }

    function change(v) {
        document.getElementById('filiere_acc_id').value = v.value;

    }

    function arrange2() {
        var univ_select = document.getElementById("sel-univ");
        var univ_v = univ_select.options[univ_select.selectedIndex].value;

        var ets_select = document.getElementById("sel-ets");
        var ets_v = ets_select.options[ets_select.selectedIndex].value;

        var fil_select = document.getElementById("sel-fil");
        var fil_v = fil_select.options[fil_select.selectedIndex].value;


        //console.log(univ_select.options);
        //enfant


        if (ets_select.options[ets_select.selectedIndex].getAttribute("parent") != univ_v) {
            ets_select.value = '';
            fil_select.value = '';

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

        for (var i = 0; i < fil_select.options.length; i++) {

            if (fil_select.options[i].getAttribute("parent") != ets_v) {
                fil_select.options[i].setAttribute("hidden", '');
            } else {
                fil_select.options[i].removeAttribute("hidden");
            }
        }

    }
</script>
<div class="box box-info padding-1">
    <div class="box-body">
        {!! $errors->first('CodeFiliere', '<div class="alert alert-danger">:message</div>') !!}
        {!! $errors->first('filiereSelection', '<div class="alert alert-danger">:message</div>') !!}

        {{-- <div class="form-group">
            {{ Form::label('CodeFiliere') }}
            {{ Form::text('CodeFiliere', $correspFilSelection->CodeFiliere, ['class' => 'form-control' . ($errors->has('CodeFiliere') ? ' is-invalid' : ''), 'placeholder' => 'Codefiliere']) }}
            {!! $errors->first('CodeFiliere', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('filiereSelection') }}
            {{ Form::text('filiereSelection', $correspFilSelection->filiereSelection, ['class' => 'form-control' . ($errors->has('filiereSelection') ? ' is-invalid' : ''), 'placeholder' => 'Filiereselection']) }}
            {!! $errors->first('filiereSelection', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="row">
            <div class="col-md-6 col-12">

                {{ Form::label('Universités') }}
                {{ Form::select('universite', \App\Models\Universite::pluck('LibelleLongUniversite', 'CodeUniversite'), null, [
                    'id' => 'sel-univ',
                    'class' => 'form-select  ' . ($errors->has('universite') ? ' is-invalid' : ''),
                    'placeholder' => '-- Séletionner --',
                    'onchange' => 'arrange2();',
                ]) }}

            </div>

            <div class="col-md-6 col-12">

                {{ Form::label('Etablissement ') }}
                <select id="sel-ets" class="form-select" onchange="arrange2()">
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

                <select id="sel-fil" class="form-select " onchange="" name="CodeFiliere">
                    <option value=""> --Sélectionner -- </option>

                    @foreach (\App\Models\Filiere::all() as $an)
                        <option value="{{ $an->CodeFiliere }}" parent='{{ $an->CodeEtablissement }}' hidden>
                            {{ $an->LibelleFiliere }} </option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-md-12 col-12">
            <div class="form-group">
                {{ Form::label('Correspond à : ') }}

                <select id="sel-fil2" class="form-select" onchange="change(this)" name="filiereSelection">
                    <option value=""> --Sélectionner -- </option>

                    @foreach (Illuminate\Support\Facades\DB::select('SELECT distinct R.libfiliere from resultats R ') as $an)
                        <option value="{{ $an->libfiliere }}">
                            {{ $an->libfiliere }} </option>
                    @endforeach
                </select>

            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>

    <p class="my-5">
        <button class="btn btn-primary text-white text-bold w-100" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
            Liste des Filières de sélection, n'ayant pas de correspondance.
        </button>
    </p>
    <div class="collapse" id="collapseExample2">
        <table class="table table-responsive" id="datatable">
            <thead>
                <th>Université Sélection</th>
                <th>Etablissement Sélection</th>
                <th>Filière Sélection</th>
                <th>Filière</th>
            </thead>
            <tbody>
                @foreach (Illuminate\Support\Facades\DB::select('SELECT distinct R.libfiliere, R.etablissementSelection, R.universiteSelection  , R.CodeUniversite from resultats R
                WHERE R.etablissementSelection NOT IN (SELECT C.filiereSelection from corresp_fil_selection C ) ') as $sel)
                    <tr>
                        <td>{{ $sel->universiteSelection }}</td>
                        <td>{{ $sel->etablissementSelection }}</td>
                        <td>{{ $sel->libfiliere }}</td>
                        <td>

                            <form method="POST" action="{{ route('correspondance-fil-selection.store') }}"
                                role="form" enctype="multipart/form-data" class="d-flex">
                                @csrf
                                <input type="text" name="filiereSelection" value="{{ $sel->libfiliere }}"
                                    class="hide">
                                {{ Form::select(
                                    'CodeEtablissement1',
                                    App\Models\Etablissement::where('CodeUniversite', $sel->CodeUniversite)->pluck(
                                        'LibelleEtablissement',
                                        'CodeEtablissement',
                                    ),
                                    null,
                                    [
                                        'id' => 'sel-ets',
                                        'onchange' => 'arrange(this.parentNode);',
                                        'class' => 'form-select',
                                        'placeholder' => '-- Etablissement --',
                                        'required' => 'required',
                                    ],
                                ) }}


                                <select id="sel-fil" class="form-select mx-1" onchange="" name="CodeFiliere"
                                    required>
                                    <option value=""> --Filière -- </option>

                                    @foreach (\App\Models\Filiere::all() as $an)
                                        <option value="{{ $an->CodeFiliere }}" parent='{{ $an->CodeEtablissement }}'
                                            hidden>
                                            {{ $an->LibelleFiliere }} </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-success btn-sm mx-3">Valider</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
