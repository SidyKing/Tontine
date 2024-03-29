
    <h1>Detail tontine <?= $maTontine['nomTontine'] ?></h1>
    <a href="<?=base_url()?>/adherent" class="btn btn-success">Revenir à la liste</a>
    <hr/>
   <div class="card mb-3">
       <div class="card-header">Description <?=$maTontine['nomTontine'] ?></div>
       <div class="card-body">
           <p class="card-title"> Début: <?= date_format(date_create($maTontine['DateDebut']),'d/m/Y') ?></p>
           <p>Nombre d'échéances prévues: <?= $maTontine['nbEcheance'] ?> échéances
           <?php if(!$echeances): ?>
           <a href="<?= base_url() ?>/adherent/genererEcheance/<?= $maTontine['id']?>" class="btn btn-success">Génerer</a>
           <?php endif; ?>
        </p>
            <p>
                <?php foreach($echeances as $echeance): ?>
                    <span class="badge rounded-pill bg-primary"><?= date_format(date_create($echeance['date']),"d/m/Y") ?></span>
                <?php endforeach; ?>
            </p>
    <?php if(session()->get('successAjEcheance')): ?>
        <div class="row alert alert-success">
            <?= session()->get('successAjEcheance') ?>
        </div>
    <?php endif;?>

        </div>
   </div>
   <div class="card">
       <div class="card-header">Les participants</div>
       <div class="card-body">
         <?php if(!$participants): ?>
            <p>Aucun participant à cette tontine pour l'instant</p>
         <?php else: ?>
            <ul class="list-group">
                <?php foreach($participants as $participant): ?>
                    <li class="list-group-item">
                        <h5 class="mb-1"> <?=$participant['prenom'] ." ". $participant['nom'] ?> </h5>
                            <p>Cotisation: <?= $participant['montant'] ?> CFA</p>
                            <?php if(session()->get('successAjCotise')): ?>
                                <div class="row alert alert-success">
                                    <?= session()->get('successAjCotise') ?>
                                </div>
                            <?php endif;?>
                            <?php 
                                $i=0;
                                if(isset($cotisations[$participant["idAdherent"]])):
                                    for($i=0;$i<$cotisations[$participant["idAdherent"]];$i++):
                            ?>
                                <span class="badge rounded-pill bg-success">
                                    <?= date_format(date_create($echeances[$i]['date']),"d/m/Y") ?>
                                </span>
                            <?php 
                                    endfor;
                                endif;
                                if($echeances):
                            ?>
                            <p class="mt-3">
                                <a class="btn btn-warning"
                                  href="<?= base_url()?>/adherent/payerEcheance/<?=$participant["idAdherent"] ?>/<?= $maTontine['id'] ?>/<?= $echeances[$i]['id'] ?>">
                                Payer
                                </a>
                            </p>
                    </li>
                <?php endif;
                        endforeach; ?>
            </ul>
         <?php endif; ?>
        </div>
   </div>