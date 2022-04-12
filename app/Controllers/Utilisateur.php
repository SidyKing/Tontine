<?php

namespace App\Controllers;

use App\Models\AdherentModel;
use CodeIgniter\HTTP\IncomingRequest;

helper(['html', 'form']);

/**
 * @property IncomingRequest $request 
 */
class Utilisateur extends BaseController
{
    public function index()
    {
        $data = ["titre" => "Sama Tontine::Connexion", "menuActif" => "connexion"];
        if ($this->request->getMethod() == "post") {
            $reglesValid = [
                "login" => ["rules" => "required|valid_email", "errors" => [
                    "required" => "le login est obligatoire",
                    "valid_email" => "email non valide"
                ]],
                "motPasse" => [
                    "rules" => "required|utilisateurValide[login,motPass]",
                    "errors" => [
                        "required" => "le mot de passe est obligatoire",
                        "utilisateurValide" => "email et/ou mot de passe incorrect(s)"
                    ]
                ],
            ];
            if (!$this->validate($reglesValid)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new AdherentModel();
                $user = $model->where('login', $this->request->getPost('login'))
                    ->where('motDePasse', $this->request->getPost('motPasse'))
                    ->first();
                $dataSession = [
                    "id" => $user["id"],
                    "nom" => $user["nom"],
                    "prenom" => $user["prenom"],
                    "login" => $user["login"],
                    "profil" => $user["profil"],
                ];
                if($user['block']=='0'){
                    session()->set($dataSession);
                    session()->set('sweet','oui');
                    return redirect()->to(base_url($user['profil']));
                }
                else{
                    $session=session();
                    $session->setFlashdata('blocked','Compte bloqué ! Contactez votre administrateur');
                    return redirect()->to('utilisateur');

                }
                
            }
        }
        echo view('layout/entete', $data);
        echo view('utilisateur/index');
        echo view('layout/pied');
    }

    public function inscription()
    {
        $data = ["titre" => "Sama Tontine::Inscription", "menuActif" => "inscription"];
        if ($this->request->getMethod() == "post") {
            $reglesValid = [
                "nom" => ["rules" => "required", "errors" => ["required" => "le nom est obligatoire"]],
                "prenom" => ["rules" => "required", "errors" => ["required" => "le prénom est obligatoire"]],
                "login" => ["rules" => "required|LoginExist[login]|min_length[6]", 
                    "errors" => [
                        "required" => "le login est obligatoire",
                        "min_length" => "le login doit comporter au moins 6 caractères",
                        "LoginExist" => "Cet email existe déjà"
                ]],
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
            if (!$this->validate($reglesValid)) {
                $data['validation'] = $this->validator;
            } else {
                $adherentData = [
                    "nom" => $this->request->getPost('nom'),
                    "prenom" => $this->request->getPost('prenom'),
                    "login" => $this->request->getPost('login'),
                    "motDePasse" => $this->request->getPost('motPasse'),
                    "profil" => "adherent"
                ];
                $adherent = new AdherentModel();
                $adherent->insert($adherentData); 
                $session = session();
                $session->setFlashdata('success', 'Incription réussie. Connectez vous');
                return redirect()->to('utilisateur');
            }
        }
        echo view('layout/entete', $data);
        echo view('utilisateur/inscription');
        echo view('layout/pied');
    }

    public function deconnexion()
    {
        session()->destroy();
        return redirect()->to('utilisateur/deconnexionMessage');
    }

    public function deconnexionMessage()
    {
        $session = session();
        $session->setFlashdata('success', 'Deconnexion réussie');
        return redirect()->to('utilisateur');
    }
    public function PasswordMessage()
    {
        $session = session();
        $session->setFlashdata('success', 'Mot de passe modifié avec succes ! Authentifiez vous');
        return redirect()->to('utilisateur');
    }
    public function modifSuccess()
    {
        session()->destroy();
        return redirect()->to('utilisateur/PasswordMessage');
    }
    public function password()
    {
        $data=["titre"=>"Sama Tontine::Changer mot de passe","menuActif"=>"password"];

        $modelAd= new AdherentModel();

        if ($this->request->getMethod()=="post") {
            $reglesValid=
            ["motPasse" => [
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
                    "id"=>session()->get('id'),
                    "motDePasse"=>$this->request->getPost('motPasse')
                ];

                    $modelAd->save($password);
                    $session= session();
                    $session->setFlashdata('successModifPass','Mot de passe modifiée avec succès');
                    return redirect()->to('utilisateur/modifSuccess');
            }
        } 
        else {
            

        }

        echo view('layout/entete', $data);
        echo view('utilisateur/modifPassword');
        echo view('layout/pied'); 
    }
}
