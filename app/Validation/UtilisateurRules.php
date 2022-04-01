<?php 
namespace App\Validation;
use App\Models\AdherentModel;

class UtilisateurRules
{
    public function utilisateurValide(string $str, string $fields, array $data)
    {
        $model= new AdherentModel();
        $user=$model->where("login",$data["login"])
                    ->where("motDePasse",$data["motPasse"])
                    ->first();
                    return $user?true:false;

    }
}
?>