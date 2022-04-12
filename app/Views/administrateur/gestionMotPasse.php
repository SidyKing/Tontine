
    <h5 align="center">Selectionner l'utilisateur dont-on doit modifier son mot de passe!</h5>
    <?php if(isset($validation)): ?>
        <div class="row alert alert-danger"> 
        <?= $validation->listErrors(); ?>
        </div>
    <?php endif; ?>
    <?php if(session()->get('successModifPass')): ?>
  <div class="row alert-success alert" role="alert"> 
  <?= session()->get('successModifPass') ?>
  </div>
  <?php endif; ?>
    <div align="center">
        <form method="post" class="needs-validation" novalidate>
             <div class="row g-3">
                        <div class="col-md-12">
                        <label for="select" class="form-label">Choisir utilisateur</label>
                        <select class="form-select" name="utilisateur">
                        <option disabled value="" selected >--------------------------------selectionner un utilisateur---------------------------------</option>
                        <?php foreach($utilisateurs as $utilisateur): ?>
                            <?php if($utilisateur['profil']!="administrateur"): ?>
                                <option value="<?= $utilisateur['id'] ?>"><?= $utilisateur['prenom'] ?> <?= $utilisateur['nom'] ?></option>
                                <?php endif; endforeach; ?>
                        </select>
                        </div>
                 </div>
                 <br>
                 <div class="row g-3">
                     <div class="col-md-6">
                         <label for="motPasse">Mot de pass</label>
                         <input type="password" class="form-control" name="motPasse" placeholder="saisir le mot de passe"  required>
                         
                     </div>
                     <div class="col-md-6">
                         <label for="motPasseConf">Confirmation du mot de pass</label>
                         <input type="password" class="form-control" name="motPasseConf" placeholder="confirmer le mot de passe" required>
                     </div>
                 </div>
               <hr class="my-4">
                 <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit">Changer Mot de passe</button>
             </form>
    </div>
    