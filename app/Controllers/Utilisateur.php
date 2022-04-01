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
                session()->set($dataSession);
                return redirect()->to(base_url($user['profil']));
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
                "login" => ["rules" => "required|min_length[6]", "errors" => [
                    "required" => "le login est obligatoire",
                    "min_length" => "le login doit comporter au moins 6 caractères"
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
}
