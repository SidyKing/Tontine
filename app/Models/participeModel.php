<?php 
namespace App\Models;
use CodeIgniter\Model;
class ParticipeModel extends Model{
    protected $table="participer";
    protected $allowedFields=["idTontine","idAdherent","montant"];
}
?>