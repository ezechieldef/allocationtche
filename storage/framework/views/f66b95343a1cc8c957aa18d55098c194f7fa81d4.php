<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="col-md-8 col-12 my-2">
                <?php echo e(Form::label('Reference_PV')); ?>

                <?php echo e(Form::text('Reference_PV', $pv->Reference_PV, ['class' => 'form-control' . ($errors->has('Reference_PV') ? ' is-invalid' : ''), 'placeholder' => 'Reference '])); ?>

                <?php echo $errors->first('Reference_PV', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
            <div class="col-md-4 col-12 my-2">
                <?php echo e(Form::label('Année Civile')); ?>

                <?php echo e(Form::select('AnneeCivile',\App\Models\AnneeAcademique::orderby('CodeAnneeAcademique', 'DESC')->pluck('CodeAnneeAcademique','CodeAnneeAcademique'), $pv->AnneeCivile, ['class' => 'form-select' . ($errors->has('AnneeCivile') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --'])); ?>

                <?php echo $errors->first('AnneeCivile', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
            <div class="col-md-6 col-12 my-2">
                <?php echo e(Form::label('Date Debut Session')); ?>

                <?php echo e(Form::date('DateDebutSession', $pv->DateDebutSession, ['class' => 'form-control' . ($errors->has('DateDebutSession') ? ' is-invalid' : ''), 'placeholder' => 'Datedebutsession'])); ?>

                <?php echo $errors->first('DateDebutSession', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
            <div class="col-md-6 col-12 my-2">
                <?php echo e(Form::label('Date Fin Session')); ?>

                <?php echo e(Form::date('DateFinSession', $pv->DateFinSession, ['class' => 'form-control' . ($errors->has('DateFinSession') ? ' is-invalid' : ''), 'placeholder' => 'Date fin session'])); ?>

                <?php echo $errors->first('DateFinSession', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
            <div class="col-md-4 col-12 my-2">
                <?php echo e(Form::label('Note Bas Page')); ?>

                <?php echo e(Form::text('NoteBasPage', $pv->NoteBasPage, ['class' => 'form-control' . ($errors->has('NoteBasPage') ? ' is-invalid' : ''), 'placeholder' => 'Notebaspage'])); ?>

                <?php echo $errors->first('NoteBasPage', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
            <div class="col-md-4 col-12 my-2">
                <?php echo e(Form::label('Date Transmission Liste')); ?>

                <?php echo e(Form::date('DateTransmissionListe', $pv->DateTransmissionListe, ['class' => 'form-control' . ($errors->has('DateTransmissionListe') ? ' is-invalid' : ''), 'placeholder' => 'Datetransmissionliste'])); ?>

                <?php echo $errors->first('DateTransmissionListe', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
            <div class="col-md-4 col-12 my-2">
                <?php echo e(Form::label('Ref Lettre Transmision Liste')); ?>

                <?php echo e(Form::text('RefLettreTransmisionListe', $pv->RefLettreTransmisionListe, ['class' => 'form-control' . ($errors->has('RefLettreTransmisionListe') ? ' is-invalid' : ''), 'placeholder' => 'Reflettretransmisionliste'])); ?>

                <?php echo $errors->first('RefLettreTransmisionListe', '<div class="invalid-feedback">:message</div>'); ?>

            </div>
        </div>
    </div>
    <div class="box-footer mt20 py-3">
        <button type="submit" class="btn btn-success w-100 text-bold text-white">Soumettre</button>
    </div>
</div>
<?php /**PATH /home/ezechiel/AllocationTche/resources/views/pv/form.blade.php ENDPATH**/ ?>