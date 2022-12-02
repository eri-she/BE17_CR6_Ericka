<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Name;
use App\Form\TaskType;
use Symfony\Component\HttpFoundation\Request;

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
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {   $todo = new Name();
       $form = $this->createForm(TaskType::class, $todo);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $todo = $form->getData();
            

            $em = $doctrine->getManager();

            $em->persist($todo);
            $em->flush();

            return $this->redirectToRoute('index');
        }
        return $this->render('action/create.html.twig', [
             "form" => $form->createView()
        ]);
    }
 
      /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit($id, Request $request, ManagerRegistry $doctrine): Response
    {
       $todo = $doctrine->getRepository(Name::class)->find($id);
       $form = $this->createForm(TaskType::class, $todo);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            
            $em = $doctrine->getManager();

            $em->persist($todo);
            $em->flush();

            return $this->redirectToRoute('index');
        }
        return $this->render('action/edit.html.twig', [
            "form" => $form->createView()
        ]);
    } 
      /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id, ManagerRegistry $doctrine): Response
    {     $em = $doctrine->getManager();
        $event = $doctrine->getRepository(Name::class)->find($id);
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute("index");
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details($id,ManagerRegistry $doctrine): Response
    {
       $event = $doctrine->getRepository(Name::class)->find($id);

        return $this->render('action/details.html.twig', [
            
          "event" => $event
        ]);
       
    }
}
