<section class="mb-4">

<h1 class="h1-responsive font-weight-bold text-center my-4">Nous contacter</h1>
  <p class="text-center w-responsive mx-auto mb-5">Avez-vous des questions? N'hésitez pas à nous contacter directement.
     Notre équipe reviendra vers vous dans les heures qui suivent pour vous aider.</p>
     <?php if(isset($validation)): ?>
  <div class="row alert alert-danger"> 
  <?= $validation->listErrors(); ?>
  </div>
  <?php endif; ?>
  <?php if(session()->get('successContact')): ?>
  <div class="row alert-success alert" role="alert"> 
  <?= session()->get('successContact') ?>
  </div>
  <?php endif; ?>
<div class="row">
    <div class="col-md-12 mb-md-0 mb-5">
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="md-form mb-0">
                    <label for="name" class="">Nom Complet</label>
                        <input type="text" id="name" name="nom" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                    <label for="email" class="">Email</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                    <label for="subject" class="">Objet</label>
                        <input type="text" id="subject" name="objet" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form">
                    <label for="message">Votre message</label>
                        <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea" ></textarea>
                    </div>
                </div>
            </div><br>
            <button type="submit" class="btn btn-primary col-md-6" >Envoyer</button>
        </form>
        
    </div>
</div>
</section>

    
  