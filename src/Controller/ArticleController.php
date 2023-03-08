<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Form\ArticleType;
use App\Form\SearchType;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\Form\FormView;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Endroid\QrCodeBundle\Response\QrCodeResponse;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class ArticleController extends AbstractController
{   
   

    #[Route('/article', name: 'article')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
    #[Route('/listA', name: 'listA')]
    public function list(ManagerRegistry $doctrine): Response
    {    
        $repository= $doctrine->getRepository(Article::class);
        $article=$repository->findAll();
        $nb = $repository->count([]);
        for($i=0;$i<$nb;$i++)
        {
           /* if($article[$i]->getStock()<6 && $article[$i]->getStock()!=0)
            {
                $repository->sms($article[$i]->getNomArticle());
            }
            else if ($article[$i]->getStock()==0 )
            {
                $repository->sms1($article[$i]->getNomArticle());
            } */
         
        }
        $articles = $repository->findAll();
        return $this->render('article/listA.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/AllArticle1', name: 'listArticle1')]
    public function listj(ManagerRegistry $doctrine, SerializerInterface $serializer): Response

    {  
        $repository= $doctrine->getRepository(Article::class);
        $article=$repository->findAll();
        $json = $serializer->serialize($article, 'json', ['groups' => "article"]);

        return new Response($json);
       /* return $this->render('article/listA.html.twig', [
            'article' => $article,
        ]);*/
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

#[Route('/addArticleJSON', name: 'addJSON')]
public function addj(HttpFoundationRequest $req, NormalizerInterface $Normalizer)
{  
  $em = $this->getDoctrine()->getManager();
   $article = new Article ();
   
   $article->setRefArticle($req->get('ref_article'));
   $article->setNomArticle($req->get('Nom_article'));
   $article->setDescription($req->get('Description'));
   $article->setPrix($req->get('Prix'));
   $article->setStock($req->get('Stock'));
    $em-> persist ($article);
    $em->flush();
    $jsonContent = $Normalizer->normalize($article,'json', ['groups'=>'article']);
    return new Response(json_encode($jsonContent));
   
  // return $this->renderForm('article/add.html.twig',['formC'=>$form]);

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
/*#[Route('/Commentaire', name: 'listCom')]
public function listcom(ManagerRegistry $doctrine): Response
{  
    $repository= $doctrine->getRepository(Commentaire::class);
    $commentaire=$repository->findAll();
    return $this->render('article/detailf.html.twig', [
        'commentaire' => $commentaire,
    ]);
} */
#[Route('getart/{id}',name:'detailf')]
public function show_id(ManagerRegistry $doctrine,$id,HttpFoundationRequest $request )
{   
    


    $repository=$doctrine->getRepository(Article::class);
    $art=$repository->find($id);

    return $this->render('article/detailf.html.twig',['article'=>$art,
        ]);
}


    
#[Route('/catprod/{id}', name: 'prodbycat')]
public function show_prodcat($id,ArticleRepository $rep, PaginatorInterface $pagination,HttpFoundationRequest $request ): Response
{    
    //$produits = $rep->Findprodbycat($id);
    $prod=$pagination->paginate(
        $article = $rep->Findprodbycat($id),
        $request->query->getInt('page',1),
        //$nb=count($produits),
        1,
    );
    return $this->render('article/listArticle.html.twig', [
        'article' => $prod,
        'id' => $id,
    ]);
}
//Exporter pdf (composer require dompdf/dompdf)
    
      #[Route("/pdf", name:"PDF_Article", methods:("GET"))]
     
    public function pdf(ArticleRepository $Repository)
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('article/listpdf.html.twig', [
            'article' => $Repository->findAll(),
        ]);
       
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("ListeDesArticles.pdf", [
            "article" => true
        ]);
    }
    #[Route('/star/{id}', name: 'star')]
    public function yourAction(HttpFoundationRequest $request,$id,ManagerRegistry $doctrine)
    {
        if ($request->isXmlHttpRequest()) {
            // handle the AJAX request
            $data = $request->getContent(); // retrieve the data sent by the client-side JavaScript code
            $repository = $doctrine->getRepository(article::class);
            $article = $repository->find($id);
            if($article->getNote()==0)
                $article->setNote(5);
            else
                $article->setNote(($article->getNote()+$data[6])/2);//modifier la note du produit
            $em=$doctrine->getManager();
            $em->persist($article);
            $em->flush();
            $prod = $repository->find($id);
            $test=$prod->getNote();
            $response = new Response();//nouvelle instance du response pour la renvoyer a la fonction ajax
            $response->setContent(json_encode($test));//encoder les donnes sous forme JSON et les attribuer a la variable response
            $response->headers->set('Content-Type', 'application/json');
            return $response;//envoie du response
        } 
    }
    /*  #[Route('/traiter/{id}', name: 'AjoutCat')]
    function Traiter(ArticleRepository $repository, $id, Request $request, ManagerRegistry $doctrine)
    {

        $article = new Categorie();
        $article = $repository->find($id);
        // $reclamation->setEtat(1 );
        $em = $doctrine->getManager();
        $em->flush();
        $repository->sms(string $quant);
        $repository->sms1(string $quant);
        $this->addFlash('danger', 'reponse envoyée avec succées');
        return $this->redirectToRoute('AjoutCat');
    } */

        
    #[Route("/article/search", name: "article_search")]

    public function search(HttpFoundationRequest $request)
    {   
        $form = $this->createFormBuilder()
        ->add('Nomarticle', TextType::class)
        ->getForm();
           
    
        $article = [];
        if ($request->isMethod('POST')) {
            $Nom_article = $request->request->get('form')['Nomarticle'];
            $article = $this->getDoctrine()
                ->getRepository(Article::class)
                ->findByName($Nom_article);
        }
    
        return $this->render('article/search.html.twig', [
            'form' => $form->createView(),
            'article' => $article,
        ]);
    }

    #[Route(path:'/article/{id}/qr-code', name: 'generate_qr_code')]
public function generateQrCodeForUser($id,ManagerRegistry $doctrine)
{
    // Get the user from the database
    $article=$doctrine->getRepository(Article::class)->find($id);
  
    // Check if the user exists
    if (!$article) {
        throw $this->createNotFoundException('User not found');
    }

    // Generate the QR code
    $qrCode = new QrCode($article->getNomArticle());

    // Set the QR code options
    $qrCode->setSize(300);
    $qrCode->setMargin(10);
    
    // Generate the PNG image data
    $writer = new PngWriter();
    $qrCodeData = $writer->write($qrCode);

// Return the QR code as an image response
$response = new Response($qrCodeData->getString(), Response::HTTP_OK, [
    'Content-Type' => $qrCodeData->getMimeType(),
]);
$response->setEtag(md5($qrCodeData->getString()));
$response->setPublic();
return $response;
    
}

}