<?php

namespace App\Controllers;

helper('html');
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
        echo view('layout/entete',$data);
        echo view('contact');
        echo view('layout/pied');
    }
}
