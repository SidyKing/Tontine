
    <h1>Adhérer à une tontine</h1>
    <p class="fs-5 col-md-8">Vous pouvez adhèrer aux tontine suivantes </p>
    <h2>Les tontines disponibles</h2>
    <?php if(session()->get('successAjAdhesion')): ?>
        <div class="row alert alert-success">
            <?= session()->get('successAjAdhesion') ?>
        </div>
    <?php endif;?>
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Périodicité</th>
            <th>Date début</th>
            <th>Nb échéances</th>
            <th>...</th>
        </tr>
        <?php 
        if(!$listeTontines): ?>
            <tr>
                <td colspan="5" class="table-danger text-center"> Aucune tontine disponible...</td>
            </tr>
        <?php 
        else: 
            foreach($listeTontines as $tontine): ?>
            <tr>
                <td> <?= $tontine['nomTontine'] ?> </td>
                <td> <?= $tontine['periodicite'] ?> </td>
                <td> <?= date_format(date_create($tontine['DateDebut']),'d M Y') ?> </td>
                <td> <?= $tontine['nbEcheance'] ?> </td>
                <td>
                    <a href="<?= base_url() ?>/adherent/adhererTontine/<?= $tontine['id'] ?>" class="btn btn-warning">Adhérer</a>
                </td>
            </tr>

        <?php endforeach;
         endif; ?>

    </table>
    
  