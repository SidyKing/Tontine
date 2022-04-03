<div class="col-12">
<h1 class="mb-3">Créer un compte</h1>
<?php if(isset($validation)): ?>
  <div class="row alert alert-danger"> 
  <?= $validation->listErrors(); ?>
  </div>
  <?php endif; ?>
             <form method="post" class="needs-validation" novalidate>
             <div class="row g-3">
                     <div class="col-sm-6">
                         <label for="prenom">Prénom</label>
                         <input type="text" class="form-control" name="prenom" placeholder="saisir le prenom" value="<?= set_value("prenom") ?>" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">le prenom est obligatoire</div>
                     </div>
                     <div class="col-sm-6">
                         <label for="nom">Nom</label>
                         <input type="text" class="form-control" name="nom" placeholder="saisir le nom" value="<?= set_value("nom") ?>" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">le nom est obligatoire</div>
                     </div>
             </div>
             <div class="row g-3">
                     <div class="col-sm-12">
                         <label for="login">Login</label>
                         <input type="text" class="form-control" name="login" placeholder="saisir le login" value="<?= set_value("login") ?>" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">le login est obligatoire</div>
                     </div>
             </div>  
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
                 <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit">S'inscrire</button>
             </form>

</div>
         