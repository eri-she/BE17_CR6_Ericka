<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActionController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('action/index.html.twig', [
            'controller_name' => 'ActionController',
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
    public function delete($id): Response
    {
        return $this->render('action/delete.html.twig', [
            'controller_name' => 'ActionController',
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
