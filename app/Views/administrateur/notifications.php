
    <h2 align="center">Mes messages</h2>
    <?php if(session()->get('sucessSup')): ?>
  <div class="row alert-success alert" role="alert"> 
  <?= session()->get('sucessSup') ?>
  </div>
  <?php endif; ?>
<br/>
<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" >
<div class="list-group list-group-flush border-bottom scrollarea">
<?php foreach($messages as $message): ?>
  <?php if($message['lu']=='0'): ?>
    <br>
      <div class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
        <div class="w-100 align-items-center justify-content-between">
          De :&nbsp;<strong class="mb-1"><?= $message['nom'] ?> : &nbsp; <?= $message['email'] ?></strong><br/>
          Objet :&nbsp;<strong class="mb-1"><?= $message['objet'] ?></strong>
            <a href="<?= base_url() ?>/administrateur/lu/<?= $message['id'] ?>" style="float: right;" class="btn btn-success">Marquer lu</a>
          </div>
        <div class="col-10 mb-1">Message :&nbsp;<?= $message['message'] ?></div>
        <a onclick="return confirm('voulez-vous vraiment supprimer le message de <?= $message['nom'] ?> ?')" href="<?= base_url() ?>/administrateur/del/<?= $message['id'] ?>" style="float: right;" class="btn btn-danger">Supprimer</a><span>&nbsp;</span>
  </div>
  <?php else: ?>
    <div class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
        <div class="w-100 align-items-center justify-content-between">
          De :&nbsp;<strong class="mb-1"><?= $message['nom'] ?> : &nbsp; <?= $message['email'] ?></strong><br/>
          Objet :&nbsp;<strong class="mb-1"><?= $message['objet'] ?></strong>
          <a href="<?= base_url() ?>/administrateur/nonlu/<?= $message['id'] ?>" style="float: right;" class="btn btn-warning">Marquer Non lu</a>
        </div>
        <div class="col-10 mb-1">Message :&nbsp;<?= $message['message'] ?></div>
        <a onclick="return confirm('voulez-vous vraiment supprimer le message de <?= $message['nom'] ?> ?')" href="<?= base_url() ?>/administrateur/del/<?= $message['id'] ?>" style="float: right;" class="btn btn-danger sup">Supprimer</a><span>&nbsp;</span>
  </div>
<?php endif; endforeach; ?>
    </div>
  </div>

 