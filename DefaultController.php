<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="welcome")
     */
    public function list()
    {
        $number = random_int(0, 100);

        return $this->render('/index.html.twig', [
            'number' => $number,
        ]);
    }
    /**
     * @Route("/hello", name="hello", methods={"GET","HEAD"})
     */
    public function hello()
    {
        return $this->render('/hello.html.twig');
    }
}
