<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{ 
    #[Route('api/login','api_login',methods:['POST'])]
    public function login(){ 
        $user =$this->getUser();
        return $this-> json(
            [
                'mail' =>$user->getUserIdentifier(),
                'roles'=> $user->getRoles()
            ] 
            );
    
    }

}