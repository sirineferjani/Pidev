<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Evenement;
use App\Form\EvenementType;
use Symfony\Component\HttpFoundation\Request;




class EvenementController extends AbstractController
{
      /**
     * @Route("/afficher", name="display_liste")
     */
    public function index(): Response
    {
        $match=$this->getDoctrine()->getManager()->getRepository(Evenement::class)->findAll();
        return $this->render('evenement/liste.html.twig', [
            'b'=>$match
        ]);
    }     
    
    /**
     * @Route("/addevenement", name="addevenement")
     */
    public function addevenement(Request $request): Response
    {
        $foot = new Evenement();
        $form=$this->createForm(EvenementType::class,$foot);
        $form->HandleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($foot);
            $em->flush();
            return $this->redirectToRoute('display_liste');
        }
return $this->render('evenement/index.html.twig',['b'=>$form->createView()]);

    }

    
/**
     * @Route("/modifierevent/{id}", name="modifierevent")
     */
    public function modifierevent(Request $request,$id): Response
    {
        $foot = $this->getDoctrine()->getManager()->getRepository(Evenement::class)->find($id);
        $form=$this->createForm(EvenementType::class,$foot);
        $form->HandleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em= $this->getDoctrine()->getManager();

            $em->flush();

return $this->redirectToRoute('display_liste');
        }
        return $this->render('evenement/update.html.twig',['b'=>$form->createView()]);

    }



    /**
     * @Route("/supprimer/{id}", name="supp")
     */
    public function deleteevent(Request $request) {
        $id = $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $delivery = $em->getRepository(Evenement::class)->find($id);
            $em->remove($delivery);
            $em->flush();                                                      return $this->redirectToRoute('display_liste');
    }






}

