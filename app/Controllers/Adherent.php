<?php

namespace App\Controllers;
use App\Models\TontineModel;
use App\Models\AdherentModel;
use App\Models\ParticipeModel;
use App\Models\EcheanceModel;
use App\Models\CotiseModel;
use CodeIgniter\I18n\Time;
helper(['html','form']);
/**
 * @property IncomingRequest $request 
 */
class Adherent extends BaseController
{
    public function index()
    {
        $model= new TontineModel();
        $idAdherent= session()->get('id');
        $data=["titre"=>"Sama Tontine::Acceuil Adherent","menuActif"=>"adherentAcc"];
        $listeTontineResp=$model->listeTontineResp($idAdherent);
        $data["listeTontineResp"]=$listeTontineResp;

        echo view('layout/entete',$data);
        echo view('adherent/index');
        echo view('layout/pied');
    }

    public function ajouterTontine()
    {
        $data=["titre"=>"Sama Tontine::Acceuil Adherent","menuActif"=>"adherentAcc"];
        $data['periodicite']=['mensuelle'=>'mensuelle','hebdomadaire'=>'hebdomadaire'];
        $data['nbEcheance']=[1=>1,2,3,4,5,6,7,8,9,10,11,12];
        if($this->request->getMethod()=="post")
        {
            $reglesValid=
            ["nom"=>["rules"=>"required",
                    "errors"=>["required"=>"nom de la tontine obligatoire"]],
            "periodicite"=>["rules"=>"required",
                    "errors"=>["required"=>"périodicité obligatoire"]],
            "DateDebut"=>["rules"=>"required|valid_date[d/m/Y]",
                    "errors"=>["required"=>"Date début obligatoire",
                    "valid_date"=>"Date non valide"]],
            "nbEcheance"=>["rules"=>"required",
                        "errors"=>["required"=>"nbEcheance obligatoire"]],
                        
            ];
            if (!$this->validate($reglesValid))
            {
                $data['validation']=$this->validator;
            }
            else
            {
                $DateDebut= Time::createFromFormat('d/m/Y',$this->request->getPost('DateDebut'));
                $tontineData=[
                    "nomTontine"=>$this->request->getPost('nom'),
                    "periodicite"=>$this->request->getPost('periodicite'),
                    "DateDebut"=>$DateDebut->format('Y/m/d'),
                    "nbEcheance"=>$this->request->getPost('nbEcheance'),
                    "idResponsable"=>session()->get('id')
                ];
                    $tontine= new TontineModel();
                    $tontine->insert($tontineData);
                    $session= session();
                    $session->setFlashdata('successAjTontine','Tontine ajoutée avec succès');
                    return redirect()->to('adherent');
            }
        }
       

        echo view('layout/entete',$data);
        echo view('adherent/ajoutTontine');
        echo view('layout/pied'); 
    }
    public function modifierTontine($idTontine)
    {
        $data=["titre"=>"Sama Tontine::Acceuil Adherent","menuActif"=>"adherentAcc"];
        $data['periodicite']=['mensuelle'=>'mensuelle','hebdomadaire'=>'hebdomadaire'];
        $data['nbEcheance']=[1=>1,2,3,4,5,6,7,8,9,10,11,12];
        $tontine= new TontineModel();

        if ($this->request->getMethod()=="post") {
            $reglesValid=
            ["nom"=>["rules"=>"required",
                    "errors"=>["required"=>"nom de la tontine obligatoire"]],
            "periodicite"=>["rules"=>"required",
                    "errors"=>["required"=>"périodicité obligatoire"]],
            "DateDebut"=>["rules"=>"required|valid_date[d/m/Y]",
                    "errors"=>["required"=>"Date début obligatoire",
                    "valid_date"=>"Date non valide"]],
            "nbEcheance"=>["rules"=>"required",
                        "errors"=>["required"=>"nbEcheance obligatoire"]],
                        
            ];
            if (!$this->validate($reglesValid))
            {
                $data['validation']=$this->validator;
            }
            else
            {
                $DateDebut= Time::createFromFormat('d/m/Y',$this->request->getPost('DateDebut'));
                $tontineData=[
                    "id"=>$this->request->getPost('id'),
                    "nomTontine"=>$this->request->getPost('nom'),
                    "periodicite"=>$this->request->getPost('periodicite'),
                    "DateDebut"=>$DateDebut->format('Y/m/d'),
                    "nbEcheance"=>$this->request->getPost('nbEcheance'),
                    "idResponsable"=>session()->get('id')
                ];
                    $tontine->save($tontineData);
                    $session= session();
                    $session->setFlashdata('successAjTontine','Tontine modifiée avec succès');
                    return redirect()->to('adherent');
            }
        } 
        else {
            $maTontine=$tontine->tontine($idTontine);
            $DateDebut= Time::createFromFormat('Y-m-d', $maTontine['DateDebut']);
            $maTontine["DateDebut"]=$DateDebut->format("d/m/Y");
            $data["tontine"]=$maTontine;

        }
       

        echo view('layout/entete', $data);
        echo view('adherent/modificationTontine');
        echo view('layout/pied'); 
    }
    public function supprimerTontine($idTontine)
    {
        $tontine= new TontineModel();
        $tontine->delete($idTontine);
        $session= session();
        $session->setFlashdata('successAjTontine','Suppression éffectuée');
        return redirect()->to(base_url().'/adherent');
    }
    public function tontine($idTontine)
    {
        $data=["titre"=>"Sama Tontine::Acceuil Adherent","menuActif"=>"adherentAcc"];
        $tontine= new TontineModel();
        $maTontine= $tontine->tontine($idTontine);
        $data['maTontine']=$maTontine;

        $modelAd=new AdherentModel();
        $participants=$modelAd->participer($idTontine);
        $data['participants']=$participants;

        $modelEcheance= new EcheanceModel();
        $echeances=$modelEcheance->echeancesTontines($idTontine);
        $data['echeances']=$echeances;

        $cotisations=$modelAd->cotiser($idTontine);
        $data['cotisations']=$cotisations;
        
        echo view('layout/entete',$data);
        echo view('adherent/tontine');
        echo view('layout/pied');
    }
    public function adhesion()
    {
        $data=["titre"=>"Sama Tontine::Acceuil Adherent","menuActif"=>"adhesion"];
        $idAdherent=session()->get('id');
        $model= new TontineModel();
        $listeTontines=$model->listeTontines($idAdherent);

        $data['listeTontines']=$listeTontines;

        echo view('layout/entete',$data);
        echo view('adherent/adhesion');
        echo view('layout/pied');
    }
    public function adhererTontine($idTontine)
    {
        $data=["titre"=>"Sama Tontine::Acceuil Adherent","menuActif"=>"adhesion"];
        if ($this->request->getMethod()=="post") {
            $reglesValid=
            ["montant"=>["rules"=>"required|integer",
                    "errors"=>["required"=>"le montant est obligatoire",
                                "integer"=>"le montant doit être un nombre"]],
                     
            ];
            if (!$this->validate($reglesValid))
            {
                $data['validation']=$this->validator;
            }
            else
            {
                $participeData=[
                    "idTontine"=>$this->request->getPost('idTontine'),
                    "montant"=>$this->request->getPost('montant'),
                    "idAdherent"=>session()->get('id'),
                    ];
                    $participe=new ParticipeModel();
                    $participe->insert($participeData);
                    $session= session();
                    $session->setFlashdata('successAjAdhesion','Adhésion effectuée');
                    return redirect()->to('adherent/adhesion');
            
            }
        }
        else{
            $data['idTontine']=$idTontine;
        }
        echo view('layout/entete',$data);
        echo view('adherent/ajoutadhesion');
        echo view('layout/pied');
    }
    public function genererEcheance($idTontine)
    {
        $model= new TontineModel();
        $maTontine=$model->tontine($idTontine);

        $tabEcheance=[];
        $DateDebut= Time::createFromFormat('Y-m-d', $maTontine['DateDebut']);
        for($i=1;$i<=$maTontine['nbEcheance'];$i++)
        {
            $tabEcheance[]=['date'=>$DateDebut->toDateString(), 'numero'=>$i, 'idTontine'=>$idTontine];
            if($maTontine['periodicite']=='mensuelle')
                $DateDebut=$DateDebut->addMonths(1);
            else
                $DateDebut=$DateDebut->addDays(7);
        }
        $modelEcheance= new EcheanceModel();
            $nbInserer=$modelEcheance->generer($tabEcheance);

            $session=session();
            $session->setFlashdata('successAjEcheance',$nbInserer. ' échéances ajoutées');
            return redirect()->to("adherent/tontine/$idTontine");
    }
    public function payerEcheance($idAdherent,$idTontine,$idEcheance)
    {
        $modelCotise=new CotiseModel();
        $modelCotise->insert(["idAdherent"=>$idAdherent,"idEcheance"=>$idEcheance]);

        $session=session();
        $session->setFlashdata('successAjCotise','cotisation enregistrée');
        return redirect()->to("adherent/tontine/$idTontine");
    }
}
