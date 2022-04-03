
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
 <h2>La liste de mes tontines</h2>
 <table class="table">
        <tr>
            <th>Nom</th>
            <th>Périodicité</th>
            <th>Date début</th>
            <th>Nb échéances</th>
            <th>Mes Cotisations</th>
        </tr>
        <?php 
        if(!$listeMesTontines): ?>
            <tr>
                <td colspan="5" class="table-danger text-center"> Aucune tontine participée pour l'instant...</td>
            </tr>
        <?php 
        else: 
            foreach($listeMesTontines as $matontine): ?>
            <tr>
                <td> <?= $matontine['nomTontine'] ?> </td>
                <td> <?= $matontine['periodicite'] ?> </td>
                <td> <?= date_format(date_create($matontine['DateDebut']),'d M Y') ?> </td>
                <td> <?= $matontine['nbEcheance'] ?> </td>
                <td>
                <?php 
                                foreach($cotisations as $coti):
                                if($coti["idTontine"]==$matontine["id"]):
                                  
                 ?>               <span class="badge rounded-pill bg-success">
                                <?= date_format(date_create($coti['date']),"d/m/Y") ?>
                                </span>
                            <?php 
            
                                endif;
                            endforeach;
                            ?>
                </td>
            </tr>

        <?php endforeach;
         endif; ?>

    </table>
    
  