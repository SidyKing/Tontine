
    <h1>Bienvenue admin <?= session()->get('prenom').' '.session()->get('nom') ?></h1>
    <p class="fs-5 col-md-8">Vous pouvez visualiser les statistiques: nombre de participants, 
        nombre de tontines, ...</p>
    <h2></h2>
    <div class="row row-cols-1 row-cols-md-2 mb-2 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h4 class="my-0 fw-normal">Nombre Tontines= <?= count($tontines) ?></h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
            <table class="table">
                        <tr>
                            <th>Nom</th>
                            <th>Date début</th>
                            <th>Périodicité</th>
                            <th>Nb Echeances</th>
                        </tr>
                            <?php 
                if(!$tontines): ?>
                    <tr>
                        <td colspan="5" class="table-danger text-center"> Aucune tontine pour l'instant...</td>
                    </tr>
                        <?php else:  foreach($tontines as $tontine):  ?>
                    <li>
                            <tr>
                                <td> <?= $tontine['nomTontine'] ?> </td>
                                <td> <?= date_format(date_create($tontine['DateDebut']),"d/m/Y") ?> </td>
                                <td> <?= $tontine['periodicite'] ?> </td>
                                <td> <?= $tontine['nbEcheance'] ?> </td>
                            </tr>
                    </li>
                    <?php endforeach;
                endif; ?>
            </table>
            </ul>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h4 class="my-0 fw-normal">Nombre Participants= <?= count($adherents) ?></h4>
          </div>
          <div class="card-body"> 
            <ul class="list-unstyled mt-3 mb-4">
            <table class="table">
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                        </tr>
                            <?php 
                if(!$adherents): ?>
                    <tr>
                        <td colspan="5" class="table-danger text-center"> Aucun participant pour l'instant...</td>
                    </tr>
                        <?php else:  foreach($adherents as $adherent):  ?>
                    <li>
                            <tr>
                                <td> <?= $adherent['prenom'] ?> </td>
                                <td> <?= $adherent['nom'] ?> </td>
                            </tr>
                    </li>
                    <?php endforeach;
                endif; ?>
            </table>
            </ul>
          </div>
        </div>
      </div>
    </div>