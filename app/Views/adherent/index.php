
    <h1>Bienvenue <?= session()->get('prenom').' '.session()->get('nom') ?></h1>
    <p class="fs-5 col-md-8">Vous pouvez gèrer vos tontine, adhèrer aux tontine disonibles,
        créer de nouvelles tontines, ...
    </p>
    <h2>Les tontines gérées
    <a href="<?=base_url()?>/adherent/ajouterTontine" class="btn btn-success">
        Nouvelle tontine
    </a></h2>
    <?php if(session()->get('successAjTontine')): ?>
  <div class="row alert-success alert" role="alert"> 
  <?= session()->get('successAjTontine') ?>
  </div>
  <?php endif; ?>
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Périodicité</th>
            <th>Date début</th>
            <th>Nb échéances</th>
            <th>...</th>
        </tr>
        <?php 
        if(!$listeTontineResp): ?>
            <tr>
                <td colspan="5" class="table-danger text-center"> Aucune tontine gérée pour l'instant...</td>
            </tr>
        <?php 
        else: 
            foreach($listeTontineResp as $tontine): ?>
            <tr>
                <td> <?= $tontine['nomTontine'] ?> </td>
                <td> <?= $tontine['periodicite'] ?> </td>
                <td> <?= date_format(date_create($tontine['DateDebut']),'d M Y') ?> </td>
                <td> <?= $tontine['nbEcheance'] ?> </td>
                <td>
                    <a href="<?= base_url() ?>/adherent/modifierTontine/<?= $tontine['id'] ?>" class="btn btn-warning">Modifier</a>
                    <a onclick="return confirm('voulez-vous vraiment supprimer la tontine <?= $tontine['nomTontine'] ?> ?')" href="<?= base_url() ?>/adherent/supprimerTontine/<?= $tontine['id'] ?>" class="btn btn-danger">Supprimer</a>
                    <a href="<?= base_url() ?>/adherent/tontine/<?= $tontine['id'] ?>" class="btn btn-info">Participants</a>
                </td>
            </tr>

        <?php endforeach;
         endif; ?>

    </table>
    
  