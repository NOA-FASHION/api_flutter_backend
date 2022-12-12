<?php

namespace App\Controller;

use App\Entity\User;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class RegistrationController extends AbstractController
{
    #[Route('api/register', name: 'register')]
    public function index(ManagerRegistry $doctrine, Request $request, UserPasswordHasherInterface $passwordHasher): Response
 {

            $em = $doctrine->getManager();
            $decoded = json_decode($request->getContent());
            $email = $decoded->email;
            $password= $decoded->plainPassword;
            $user = new User();
         
            $user->setPlainPassword($password);
            $user->setEmail($email);
            $em->persist($user);
            $em->flush();

            return $this->json(['message' => 'Registered Successfully']);
            }

}
