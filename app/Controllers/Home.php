<?php

namespace App\Controllers;

helper('html');
/**
 * @property IncomingRequest $request 
 */
class Home extends BaseController
{
    public function index()
    {
        $data=["titre"=>"Sama Tontine::Acceuil","menuActif"=>"acceuil"];
        echo view('layout/entete',$data);
        echo view('welcome_message');
        echo view('layout/pied');
    }
    public function presentation()
    {
        $data=["titre"=>"Sama Tontine::Presentation","menuActif"=>"presentation"];
        echo view('layout/entete',$data);
        echo view('presentation');
        echo view('layout/pied');
    }
    public function contact()
    {
        $data=["titre"=>"Sama Tontine::Contact","menuActif"=>"contact"];
        if ($this->request->getMethod() == "post") {
            $reglesValid = [
                "nom" => ["rules" => "required", "errors" => ["required" => "le nom est obligatoire"]],
                "objet" => ["rules" => "required", "errors" => ["required" => "l'objet est obligatoire"]],
                "message" => ["rules" => "required", "errors" => ["required" => "le message est obligatoire"]],
                "email" => ["rules" => "required|valid_email", "errors" => [
                    "required" => "l'email est obligatoire",
                    "valid_email" => "email invalide"
                ]],
                
            ];
            if (!$this->validate($reglesValid)) {
                $data['validation'] = $this->validator;
            } else {
                $nom=$this->request->getPost('nom');
                $session = session();
                $session->setFlashdata('successContact', "$nom, votre message a été transmis avec succes !");
                return redirect()->to('home/contact');
            }
        }
        else{
           
        }
        echo view('layout/entete',$data);
        echo view('contact');
        echo view('layout/pied');
    }
}
