
    <h1>Connexion</h1>
    <?php if(isset($validation)): ?>
  <div class="row alert alert-danger"> 
  <?= $validation->listErrors(); ?>
  </div>
  <?php endif; ?>
    <?php if(session()->get('success')): ?>
  <div class="row alert-success alert" role="alert"> 
  <?= session()->get('success') ?>
  </div>
  <?php endif; ?>
  <?php if(session()->get('nonAutorise')): ?>
  <div class="row alert-danger alert" role="alert"> 
  <?= session()->get('nonAutorise') ?>
  </div>
  <?php endif; ?>
  <form method="post">
    <h1 class="h3 mb-3 fw-normal">Entrez vos login et mot de passe</h1>

    <div class="form-floating">
      <input name="login" type="text" class="form-control" id="floatingInput" placeholder="nom@example.com" value="<?= set_value("login") ?>">
      <label for="floatingInput">Login</label>
    </div>
    <div class="form-floating">
      <input name="motPasse" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" >
      <label for="floatingPassword">Mot de passe</label>
    </div>

   
    <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
    
  </form>

	<script>
           /*La fonction principale de ce script est d'empêcher l'envoi du formulaire si un champ a été mal rempli
            *et d'appliquer les styles de validation aux différents éléments de formulaire*/
           (function() {
             'use strict';
             window.addEventListener('load', function() {
               let forms = document.getElementsByClassName('needs-validation');
               let validation = Array.prototype.filter.call(forms, function(form) {
                 form.addEventListener('submit', function(event) {
                   if (form.checkValidity() === false) {
                     event.preventDefault();
                     event.stopPropagation();
                   }
                   form.classList.add('was-validated');
                 }, false);
               });
             }, false);
           })();
         </script>