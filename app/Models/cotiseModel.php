<?php 
namespace App\Models;
use CodeIgniter\Model;
class CotiseModel extends Model{
    protected $table="cotiser";
    protected $allowedFields=["idAdherent","idEcheance"];
}
?>