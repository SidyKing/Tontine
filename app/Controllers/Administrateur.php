<?php

namespace App\Controllers;
use App\Models\TontineModel;
use App\Models\AdherentModel;
use App\Models\NotificationModel;
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
    public function gestionMotPasse()
    {
            $modelAd= new AdherentModel();
            $data=["titre"=>"Sama Tontine::Gestion Mot de passe","menuActif"=>"changerPassword"];
            $utilisateurs=$modelAd->Utilisateurs();
            $data['utilisateurs']=$utilisateurs;
           // var_dump($utilisateurs);
    
            if ($this->request->getMethod()=="post") {
                $reglesValid=
                [   "utilisateur" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "l'utilisateur est obligatoire"
                    ]
                ],
                    "motPasse" => [
                    "rules" => "required|min_length[6]",
                    "errors" => [
                        "required" => "le mot de passe est obligatoire",
                        "min_length" => "le mot de passe doit comporter au moins 6 caractères"
                    ]
                ],
                "motPasseConf" => [
                    "rules" => "required|matches[motPasse]",
                    "errors" => [
                        "required" => "la confirmation du mot de passe est obligatoire",
                        "matches" => "la confirmation doit etre identique au mot de passe"
                    ]
                ],
                            
                ];
                if (!$this->validate($reglesValid))
                {
                    $data['validation']=$this->validator;
                }
                else
                {
                    $password=[
                        "id"=>$this->request->getPost('utilisateur'),
                        "motDePasse"=>$this->request->getPost('motPasse')
                    ];
    
                        $modelAd->save($password);
                        $session= session();
                        $session->setFlashdata('successModifPass','Mot de passe modifiée avec succès');
                        return redirect()->to('administrateur/gestionMotPasse');
                }
            } 
            else {
                
    
            }
        echo view('layout/entete',$data);
        echo view('administrateur/gestionMotPasse');
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
    public function notifications()
    {
        $modelNot= new NotificationModel();
        $data=["titre"=>"Sama Tontine::Messages","menuActif"=>"notifications"];
        $messages=$modelNot->Notifications();
        $data['messages']=$messages;
       // var_dump($utilisateurs);

        echo view('layout/entete',$data);
        echo view('administrateur/notifications');
        echo view('layout/pied');
    }
    public function lu($idNotification)
    {
        $data=["titre"=>"Sama Tontine::Message","menuActif"=>"notifications"];
        $modelNot= new NotificationModel();

        if ($this->request->getMethod()=="post") {
            
        } 
        else {
            $lu="1";
            $donnee=[
                "id"=>$idNotification,
                "lu"=>$lu
            ];

                $modelNot->save($donnee);
                return redirect()->to(base_url().'/administrateur/notifications');
        } 
    }
    public function nonlu($idNotification)
    {
        $data=["titre"=>"Sama Tontine::Message","menuActif"=>"notification"];
        $modelNot= new NotificationModel();

        if ($this->request->getMethod()=="post") {
            
        } 
        else {
            $lu="0";
            $donnee=[
                "id"=>$idNotification,
                "lu"=>$lu
            ];

                $modelNot->save($donnee);
                return redirect()->to(base_url().'/administrateur/notifications');
        } 
    }
    public function del($idNo)
    {
        $notif= new NotificationModel();
        $notif->delete($idNo);
        $session= session();
        $session->setFlashdata('successSup','Suppression éffectuée');
        return redirect()->to(base_url().'/administrateur/notifications');
    }
}
