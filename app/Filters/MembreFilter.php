<?php
namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MembreFilter implements FilterInterface{

    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('id'))
        {
            session()->setFlashdata("nonAutorise","Acces non autorisé !");
            return redirect()->to('utilisateur');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }

}
?>