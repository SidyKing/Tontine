<?php

namespace App\Controllers;
use App\Models\TontineModel;
use App\Models\AdherentModel;
helper('html');
class Administrateur extends BaseController
{
    public function index()
    {
        $model= new TontineModel();
        $modelAd= new AdherentModel();
        $data=["titre"=>"Sama Tontine::Acceuil Administrateur","menuActif"=>"administrateurAcc"];
        $tontines=$model->nombreTontine();
        $adherents=$modelAd->nombreAdherent();
        $data['tontines']=$tontines;
        $data['adherents']=$adherents;

        echo view('layout/entete',$data);
        echo view('administrateur/index');
        echo view('layout/pied');
    }
    public function gestionUtilisateurs()
    {
        $modelAd= new AdherentModel();
        $data=["titre"=>"Sama Tontine::Gestion utilisateurs","menuActif"=>"gestionUtilisateurs"];
        $utilisateurs=$modelAd->Utilisateurs();
        $data['utilisateurs']=$utilisateurs;
       // var_dump($utilisateurs);

        echo view('layout/entete',$data);
        echo view('administrateur/gestionUtilisateurs');
        echo view('layout/pied');
    }
    public function bloquer($idUtilisateur)
    {
        $data=["titre"=>"Sama Tontine::Gestion utilisateurs","menuActif"=>"password"];
        $modelAd= new AdherentModel();

        if ($this->request->getMethod()=="post") {
            
        } 
        else {
            $block="1";
            $donnee=[
                "id"=>$idUtilisateur,
                "block"=>$block
            ];

                $modelAd->save($donnee);
                $session=session();
                $session->setFlashdata('block','utilisateur bloqué avec succes');
                return redirect()->to(base_url().'/administrateur/gestionUtilisateurs');
        } 
    }

    public function debloquer($idUtilisateur)
    {
        $data=["titre"=>"Sama Tontine::Gestion utilisateurs","menuActif"=>"password"];
        $modelAd= new AdherentModel();

        if ($this->request->getMethod()=="post") {
            
        } 
        else {
            $block="0";
            $donnee=[
                "id"=>$idUtilisateur,
                "block"=>$block
            ];

                $modelAd->save($donnee);
                $session=session();
                $session->setFlashdata('deblock','utilisateur débloqué avec succes');
                return redirect()->to(base_url().'/administrateur/gestionUtilisateurs');
        } 
    }
    
}
