<?php
namespace App\Models;
use CodeIgniter\Model;
class NotificationModel extends Model{
    protected $table="notification";
    protected $allowedFields=["nom","email","objet","message","lu"];

    
    function Notifications()
    {
        return $this->orderBy('id', 'DESC')
                    ->findAll();
    }
    
}
?>