<?php
namespace App\Models;
use CodeIgniter\Model;
class AdherentModel extends Model{
    protected $table="adherent";
    protected $allowedFields=["nom","prenom","login","motDePasse","profil","block"];

    function participer($idTontine)
    {
        return $this->join("participer as p", "p.idAdherent=adherent.id")
                    ->join("tontine as t", "t.id=p.idTontine")
                    ->where("t.id",$idTontine)
                    ->findAll();
    }
    function cotiser($idTontine)
    {
        $cotis=$this->selectCount('adherent.id','nbCotis')
                    ->select('adherent.id')
                    ->join("cotiser c","c.idAdherent=adherent.id")
                    ->join("echeance e","e.id=c.idEcheance")
                    ->where("e.idTontine",$idTontine)
                    ->groupBy('adherent.id')
                    ->get()->getResultArray();
        $cotisations=[];
        foreach($cotis as $coti)
            $cotisations[$coti["id"]]=$coti["nbCotis"];
        return $cotisations; 
    }
    function nombreAdherent()
    {
        return $this->join("participer as p", "p.idAdherent=adherent.id")
                    ->distinct()
                    ->select("nom,prenom,id")
                    ->findAll();
    }
    function Utilisateurs()
    {
        return $this->findAll();
    }
}
?>