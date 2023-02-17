<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(): Response
    {
        return $this->render('base-back.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
    #[Route('/listA', name: 'listA')]
    public function list(ManagerRegistry $doctrine): Response
    {  
        $repository= $doctrine->getRepository(Article::class);
        $article=$repository->findAll();
        return $this->render('article/listA.html.twig', [
            'article' => $article,
        ]);
    }
    #[Route('/add', name: 'add')]
    public function add(HttpFoundationRequest $request,ManagerRegistry $doctrine,SluggerInterface $slugger): Response
    {  
       $article=new Article;
       $form=$this->createForm(ArticleType::class,$article);
       $form->add('Enregistrer',SubmitType::class);

       $form->handleRequest($request);
       if($form->isSubmitted()&& $form->isValid())
       {
        $photo = $form->get('Photo')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($photo) {
                $originalFilename = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$photo->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $photo->move(
                        $this->getParameter('article_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $article->setImage($newFilename);
            }
        $em=$doctrine->getManager();
        $em-> persist ($article);
        $em->flush();
        return $this->redirectToRoute('listA');
       }
       return $this->renderForm('article/add.html.twig',['formC'=>$form]);
    
}
#[Route('/editA/{id}', name: 'editA')]
public function editA(HttpFoundationRequest $request,ManagerRegistry $doctrine,$id,SluggerInterface $slugger ): Response
{  
    $repository= $doctrine->getRepository(Article::class);
    $article=$repository->find($id);
   $form=$this->createForm(ArticleType::class,$article);
   $form->add('modifier',SubmitType::class);
   $form->handleRequest($request);
   if($form->isSubmitted())
   {
    $photo = $form->get('Photo')->getData();

    // this condition is needed because the 'brochure' field is not required
    // so the PDF file must be processed only when a file is uploaded
    if ($photo) {
        $originalFilename = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
        // this is needed to safely include the file name as part of the URL
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$photo->guessExtension();

        // Move the file to the directory where brochures are stored
        try {
            $photo->move(
                $this->getParameter('article_directory'),
                $newFilename
            );
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        // updates the 'brochureFilename' property to store the PDF file name
        // instead of its contents
        $article->setImage($newFilename);
    }
    $em=$doctrine->getManager();
    $article->setNomArticle($form->get('Nom_article')->getData());
    $em->flush();
    return $this->redirectToRoute('listA');
   }
   return $this->renderForm('article/edit.html.twig',['formC'=>$form]);
}
#[Route('/deleteA/{id}',name: 'deleteA')]
public function deleteS (ManagerRegistry $doctrine,$id):Response
{  
    $repository=$doctrine->getRepository(Article::class);
    $article=$repository->find($id);
    $em=$doctrine->getManager();
    $em->remove($article);
    $em->flush();
    return $this->redirectToRoute('listA');
}
#[Route('/affichage', name: 'affichage')]
public function show(ManagerRegistry $doctrine): Response
{  
    $repository= $doctrine->getRepository(Article::class);
    $article=$repository->findAll();
    return $this->render('article/Affichage.html.twig', [
        'article' => $article,
    ]);
}
}