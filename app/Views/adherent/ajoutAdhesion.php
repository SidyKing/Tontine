<div class="row g-5">
<div class="col-12">
<h1 class="mb-3">Adhérer à une tontine</h1>
<?php if(isset($validation)): ?>
  <div class="row alert alert-danger"> 
  <?= $validation->listErrors(); ?>
  </div>
  <?php endif; ?>
             <form method="post">
             <?= form_hidden('idTontine', isset($idTontine)?$idTontine:set_value('idTontine')); ?>
             <div class="row g-3">
                     <div class="col-sm-12">
                         <label for="montant" class="form-label">Montant</label>
                         <?= form_input(['name'=>'montant','class'=>'form-control','placeholder'=>'saisir le montant','value'=>set_value('montant')]) ?>
                     </div>
                     
             </div>
  
               <hr class="my-4">
                <?= form_submit(['name'=>'adherer','class'=>'w-100 btn btn-primary','value'=>'Adhérer']) ?>
              </form>

</div>
</div>       