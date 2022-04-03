
    <h2 align="center">Liste des utilisateurs</h2>
    <?php if(session()->get('block')): ?>
  <div class="row alert-warning alert" role="alert"> 
  <?= session()->get('block') ?>
  </div>
  <?php endif; ?>
  <?php if(session()->get('deblock')): ?>
  <div class="row alert-success alert" role="alert"> 
  <?= session()->get('deblock') ?>
  </div>
  <?php endif; ?>
    <table class="table ">
                        <tr class="row mb-3">
                            <th class="col-md-2">Prenom</th>
                            <th class="col-md-2">Nom</th>
                            <th class="col-md-3">Login</th>
                            <th class="col-md-2">Profil</th>
                            <th class="col-md-3">...</th>
                        </tr>
    </table>
    <?php foreach($utilisateurs as $utilisateur): ?>
    <div class="row mb-3">
      <div class="col-md-2 themed-grid-col"><?= $utilisateur['prenom'] ?></div>
      <div class="col-md-2 themed-grid-col"><?= $utilisateur['nom'] ?></div>
      <div class="col-md-3 themed-grid-col"><?= $utilisateur['login'] ?></div>
      <div class="col-md-2 themed-grid-col"><?= $utilisateur['profil'] ?></div>
      <div class="col-md-3 themed-grid-col">
        <?php if($utilisateur['block']=="0"): ?>
          <a href="<?= base_url() ?>/administrateur/bloquer/<?= $utilisateur['id'] ?>" class="btn btn-danger">Bloquer</a>
        <?php else: ?>  
          <a href="<?= base_url() ?>/administrateur/debloquer/<?= $utilisateur['id'] ?>" class="btn btn-success">Débloquer</a>
        <?php endif; ?>
        </div>
    </div>

      <?php endforeach; ?>

    <style>
            .themed-grid-col {
        padding-top: .75rem;
        padding-bottom: .75rem;
        background-color: rgba(86, 61, 124, .15);
        border: 1px solid rgba(86, 61, 124, .2);
      }

      .themed-container {
        padding: .75rem;
        margin-bottom: 1.5rem;
        background-color: rgba(0, 123, 255, .15);
        border: 1px solid rgba(0, 123, 255, .2);
      }
    </style>