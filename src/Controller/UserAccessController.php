<?php
namespace App\Controller;
    
use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
 use Doctrine\ORM\EntityManagerInterface;
        
        class UserAccessController extends AbstractController
        {
            private $entityManager;
        
            public function __construct(EntityManagerInterface $entityManager)
            {
                $this->entityManager = $entityManager;
            }
        
            /**
             * @Route("/access", name="display")
             */
            public function index(): Response
            {
                $users = $this->entityManager
                    ->getRepository(User::class)
                    ->findAll();
            
                return $this->render('admin/dashboard.html.twig', [
                    'users' => $users
                ]);
            }
            
            /**
             * @Route("/users/{id}/edit", name="user_edit")
             */
            public function edit(Request $request, User $user): Response
            {
                $form = $this->createForm(RegistrationFormType::class, $user);
                $form->handleRequest($request);
        
                if ($form->isSubmitted() && $form->isValid()) {
                    // Get the roles as a comma-separated string
                    $roles = implode(',', $user->getRoles());
                
                    // Set the roles of the user entity
                    $user->setRoles([$roles]); // Handle the uploaded file
                    $file = $form->get('Photo')->getData();
                    if ($file) {
                        $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                        $file->move(
                            $this->getParameter('img_directory'),
                            $fileName
                        );
                        $user->setImage($fileName);
                    }

        
                    $this->entityManager->flush();
        
                    // Create a new form with the updated data
                    $newForm = $this->createForm(RegistrationFormType::class, $user);
        
                    // Render the new form
                    return $this->render('admin/edit.html.twig', [
                        'form' => $newForm->createView(),
                    ]);
                }
        
                return $this->render('admin/edit.html.twig', [
                    'user' => $user,
                    'form' => $form->createView(),
                ]);
            }

    /* kbal manzid fzet el role
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('display');
        }

        return $this->render('admin/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }*/

    /**
     * @Route("/users/{id}", name="user_delete")
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $this->entityManager->remove($user);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('display');
    }
   
    /**
     * @Route("/client", name="_profiler_home")
     */
    public function indexClient(): Response
    {

        return $this->render('client/client.html.twig');
    }

      /**
 * @Route("/famille", name="famille")
 */
public function indexfamille(): Response
{
    $user = $this->getUser();

    return $this->render('client/famille.html.twig', [
        'user' => $user,
    ]);
}

/**
 * @Route("/agence", name="agence")
 */
public function indexagence(): Response
{
    $user = $this->getUser();

    return $this->render('client/agence.html.twig', [
        'user' => $user,
    ]);
}

/**
 * @Route("/boutique", name="boutique")
 */
public function indexboutique(): Response
{
    $user = $this->getUser();

    return $this->render('client/boutique.html.twig', [
        'user' => $user,
    ]);
}

    

}


