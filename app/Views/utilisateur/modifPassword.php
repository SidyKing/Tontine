<div class="col-12">
<h1 class="mb-3">Modification mot de passe</h1>
<?php if(isset($validation)) : ?>
  <div class="row alert alert-danger"> 
     <?= $validation->listErrors(); ?>
  </div>
  <?php endif; ?>
             <form method="post" class="needs-validation" >
             <div class="row g-3">
                     <div class="col-md-6">
                         <label for="motPasse">Mot de pass</label>
                         <input type="password" class="form-control" name="motPasse" placeholder="saisir le mot de passe"  required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">le mot de passe est obligatoire</div>
                     </div>
                     <div class="col-md-6">
                         <label for="motPasseConf">Confirmation du mot de pass</label>
                         <input type="password" class="form-control" name="motPasseConf" placeholder="confirmer le mot de passe" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">la confirmation est obligatoire</div>
                     </div>
                 </div>
               <hr class="my-4">
              <a onclick="return confirm('voulez-vous vraiment modifier le mot de passe ?')">  <?= form_submit(['name'=>'ajouter','class'=>'w-100 btn btn-primary','value'=>'Modifier',]) ?> </a>
            </form>

</div>
         