<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Name;
use Symfony\Bridge\Doctrine\ManagerRegistry as DoctrineManagerRegistry;

class ActionController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ManagerRegistry $doctrine): Response
    { $events = $doctrine->getRepository(Name::class)->findAll();
        return $this->render('action/index.html.twig', [
           
            'events' => $events
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(): Response
    {
        return $this->render('action/create.html.twig', [
            'controller_name' => 'ActionController',
        ]);
    }
 
      /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit($id): Response
    {
        return $this->render('action/edit.html.twig', [
            'controller_name' => 'ActionController',
        ]);
    } 
      /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id, ManagerRegistry $doctrine): Response
    {      $em = $doctrine->getManager();
        $event = $doctrine->getRepository(Name::class)->find($id);
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute('index', [
            
        ]);
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details($id): Response
    {
       
        return $this->render('action/details.html.twig', [
            'controller_name' => 'ActionController',
        ]);
    }
}
