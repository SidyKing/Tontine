<?php 
namespace App\Models;
use CodeIgniter\Model;
class EcheanceModel extends Model{
    protected $table="echeance";
    protected $allowedFields=["date","numero","idTontine"];
    function generer($tabEcheance)
    {
        return $this->insertBatch($tabEcheance);
    }
    function echeancesTontines($idTontine)
    {
        return $this->where('idTontine',$idTontine)
                    ->findAll();
    }
}
?>