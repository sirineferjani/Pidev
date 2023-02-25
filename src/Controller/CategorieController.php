<?php

namespace App\Controller;

use App\Entity\Categorie;

use Symfony\Component\Form\AbstractExtension;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;
use App\Form\CategorieType;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }
    #[Route('/listC', name: 'listC')]
    public function list(ManagerRegistry $doctrine): Response
    {  
        $repository= $doctrine->getRepository(Categorie::class);
        $categorie=$repository->findAll();
        return $this->render('categorie/listC.html.twig', [
            'categorie' => $categorie,
        ]);
    }
    #[Route('/addC', name: 'addC')]
    public function addC (HttpFoundationRequest $request,ManagerRegistry $doctrine,SluggerInterface $slugger): Response
    {          
      
       $categorie=new Categorie;
       $form=$this->createForm(CategorieType::class,$categorie);
       $form->add('Enregistrer',SubmitType::class);

       $form->handleRequest($request);
       if($form->isSubmitted()&& $form->isValid())
       {
        $photo1 = $form->get('Photo1')->getData();

        // this condition is needed because the 'brochure' field is not required
        // so the PDF file must be processed only when a file is uploaded
        if ($photo1) {
            $originalFilename = pathinfo($photo1->getClientOriginalName(), PATHINFO_FILENAME);
            // this is needed to safely include the file name as part of the URL
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$photo1->guessExtension();

            // Move the file to the directory where brochures are stored
            try {
                $photo1->move(
                    $this->getParameter('article_directory'),
                    $newFilename
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }

            // updates the 'brochureFilename' property to store the PDF file name
            // instead of its contents
            $categorie->setImageC($newFilename);
        }
        $em=$doctrine->getManager();
        $em-> persist ($categorie);
        $em->flush();
        return $this->redirectToRoute('listC');
       }
       return $this->renderForm('categorie/addC.html.twig',['formA'=>$form]);
    
}
#[Route('/editC/{id}', name: 'editC')]
public function editC(HttpFoundationRequest $request,ManagerRegistry $doctrine,$id,SluggerInterface $slugger ): Response
{  
    $repository= $doctrine->getRepository(Categorie::class);
    $categorie=$repository->find($id);
   $form=$this->createForm(CategorieType::class,$categorie);
   $form->add('modifier',SubmitType::class);
   $form->handleRequest($request);
   if($form->isSubmitted())
   {
    $photo1 = $form->get('Photo1')->getData();

    // this condition is needed because the 'brochure' field is not required
    // so the PDF file must be processed only when a file is uploaded
    if ($photo1) {
        $originalFilename = pathinfo($photo1->getClientOriginalName(), PATHINFO_FILENAME);
        // this is needed to safely include the file name as part of the URL
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$photo1->guessExtension();

        // Move the file to the directory where brochures are stored
        try {
            $photo1->move(
                $this->getParameter('article_directory'),
                $newFilename
            );
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        // updates the 'brochureFilename' property to store the PDF file name
        // instead of its contents
        $categorie->setImageC($newFilename);
    }
    $em=$doctrine->getManager();
    $categorie->setnomC($form->get('nomC')->getData());
    $em->flush();
    return $this->redirectToRoute('listC');
   }
   return $this->renderForm('categorie/editC.html.twig',['formA'=>$form],);
}
#[Route('/deleteC/{id}',name: 'deleteC')]
public function deleteC (ManagerRegistry $doctrine,$id):Response
{  
    $repository=$doctrine->getRepository(Categorie::class);
    $categorie=$repository->find($id);
    $em=$doctrine->getManager();
    $em->remove($categorie);
    $em->flush();
    return $this->redirectToRoute('listC');
}

    #[Route('/listCf', name: 'affich_cat')]
    public function listcf(ManagerRegistry $doctrine): Response
    {  
        $repository= $doctrine->getRepository(Categorie::class);
        $categorie=$repository->findAll();
        return $this->render('categorie/catfront.html.twig', [
            'categorie' => $categorie,
        ]);
    }

    #[Route('/getpf/{id}', name:'atrcat')]
    public function listarticlecat(ManagerRegistry $doctrine,$id):Response
    {
        $rep=$doctrine->getRepository(Categorie::class);
        $cat=$rep->find($id);
        return $this->render('categorie/articlecategorie.html.twig',['cat'=>$cat,'id'=>$id,]);
    }



}
