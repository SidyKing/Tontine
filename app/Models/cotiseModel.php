<?php 
namespace App\Models;
use CodeIgniter\Model;
class CotiseModel extends Model{
    protected $table="cotiser";
    protected $allowedFields=["idAdherent","idEcheance"];
    public function cotisations($idAdherent)
    {
        return $this->where('idAdherent', $idAdherent)
                    ->join("echeance as e", "e.id=idEcheance")
                    ->findAll();
    }
}
?>