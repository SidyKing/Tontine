<div class="col-12">
<h1 class="mb-3">Modification tontine</h1>
<?php if(isset($validation)) : ?>
  <div class="row alert alert-danger"> 
     <?= $validation->listErrors(); ?>
  </div>
  <?php endif; ?>
             <form method="post" class="needs-validation" >
               <?= form_hidden('id', isset($tontine['id'])?$tontine['id']:set_value('id')) ?>
             <div class="row g-3">
                     <div class="col-sm-6">
                         <label for="nom">Nom</label>
                         <?= form_input(['name'=>'nom','class'=>'form-control','placeholder'=>'saisir le nom','value'=>isset($tontine['nomTontine'])?$tontine['nomTontine']:set_value('nom')]) ?>
                     </div>
                     <div class="col-sm-6">
                         <label for="nom">Périodicité</label>
                         <?= form_dropdown('periodicite', $periodicite, isset($tontine['periodicite'])?$tontine['periodicite']:set_value('periodicite'), ["class"=>"form-control"]); ?>
                     </div>
             </div>
  
                 <div class="row g-3">
                     <div class="col-md-6">
                         <label for="motPasse">Date début</label>
                         <?= form_input(['name'=>'DateDebut','class'=>'form-control','placeholder'=>'jj/mm/AA','value'=>isset($tontine['DateDebut'])?$tontine['DateDebut']:set_value('DateDebut')]) ?>
                     </div>
                     <div class="col-md-6">
                         <label for="motPasseConf">Nb écheances</label>
                         <?= form_dropdown('nbEcheance', $nbEcheance, isset($tontine['nbEcheance'])?$tontine['nbEcheance']:set_value('nbEcheance'), ["class"=>"form-control"]); ?>
                     </div>
                 </div>
               <hr class="my-4">
                <?= form_submit(['name'=>'ajouter','class'=>'w-100 btn btn-primary','value'=>'Modifier']) ?>
              </form>

</div>
         