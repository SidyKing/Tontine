<?php
namespace App\Models;
use CodeIgniter\Model;
class TontineModel extends Model{
    protected $table="tontine";
    protected $allowedFields=["nomTontine","periodicite","DateDebut","nbEcheance","idResponsable"];
    
    function listeTontineResp($idAdherent)
    {
        return $this->where('idResponsable', $idAdherent)
                    ->findAll();
    }
    function tontine($idTontine)
    {
        return $this->find($idTontine);
    }
    function listeTontines($idAdherent)
    {
        $listPart=$this->builder('participer')
                        ->distinct()
                        ->select('idTontine')
                        ->where('idAdherent',$idAdherent)->get()->getResultArray();
        $idTon=[];
        foreach($listPart as $tp)
            $idTon[]=$tp['idTontine'];
        if ($idTon){
            $this->whereNotIn("id",$idTon);
        return $this->findAll();
        }
        else{
            return $this->findAll();
        }
            
    }
    function mesTontines($idAdherent)
    {
        $listPart=$this->builder('participer')
                        ->distinct()
                        ->select('idTontine')
                        ->where('idAdherent',$idAdherent)->get()->getResultArray();
        $idTon=[];
        foreach($listPart as $tp)
            $idTon[]=$tp['idTontine'];
        if ($idTon){
            $this->whereIn("id",$idTon);
        return $this->findAll();
        }
            
    }
    function nombreTontine()
    {
        return $this->findAll();
    }
}
?>