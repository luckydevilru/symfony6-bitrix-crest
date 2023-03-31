<?php

namespace App\Controller;

use App\Service\Bx24;
use App\Service\CRest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AppController.php',
        ]);
    }


    #[Route('/install', name: 'install')]
    public function install(): Response
    {

        $result = CRest::installApp() ?? null;
        if ($result !== null && $result['install'] === true) {
            $params = ['result' => ['readonly' => true,'install' => true]];
            return $this->render('install.html.twig',$params);
        }else{
            return $this->json(['status' => 'error with CRest::installApp()']);
        }
    }


    #[Route('/getdata', name: 'getdata')]
    public function getdata(Bx24 $bx): Response
    {
//        $message = $bx->getDepartments();
        CRest::call('profile');
        return $this->json([
            'Route' => 'getdata',
            'method' => "CRest::call(profile)",
        ]);
    }
}
