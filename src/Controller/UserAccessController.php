<?php
namespace App\Controller;
    
use App\Entity\User;
use App\Form\ProfileFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Endroid\QrCodeBundle\Response\QrCodeResponse;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
        
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
            public function index(Request $request): Response
            {   $blocked = $request->query->get('blocked');
                $users = $this->entityManager
                    ->getRepository(User::class)
                    ->findAll();
                    return $this->render('admin/dashboard.html.twig', [
                        'blocked' => $blocked,
                        'users' => $users,
                    ]);
                
            }
            
            /**
             * @Route("/users/{id}/edit", name="user_edit")
             */
            public function edit(Request $request, User $user , UserPasswordHasherInterface $passwordHasher): Response
            {
                $form = $this->createForm(ProfileFormType::class, $user);
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
                    $password = $form->get('password')->getData();
                    if (!empty($password)) {
                        $hashedPassword = $passwordHasher->hashPassword($user, $password);
                        $user->setPassword($hashedPassword);
                    }
        
                    $this->entityManager->flush();
        
                    // Create a new form with the updated data
                    $form = $this->createForm(ProfileFormType::class, $user);
        
                    // Render the new form
                    return $this->redirectToRoute('display');
                }
        
                return $this->render('admin/edit.html.twig', [
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
     * @Route("/site", name="site")
     */
    public function indexsite(): Response
    {

        return $this->render('base-front.html.twig');
    }
    /**
     * @Route("/client", name="_profiler_home")
     */
    public function indexClient(): Response
    {

        return $this->render('client/client.html.twig');
    }
        /**
     * @Route("/blocked", name="blocked")
     */
    public function indexblocked(): Response
    {

        return $this->render('client/blocked.html.twig');
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

/**
 * @Route("/activite", name="activite")
 */
public function indexactivite(): Response
{
    $user = $this->getUser();

    return $this->render('client/activities.html.twig', [
        'user' => $user,
    ]);
}

/**
 * @Route("/store", name="store")
 */
public function indexstore(): Response
{
    $user = $this->getUser();

    return $this->render('client/stores.html.twig', [
        'user' => $user,
    ]);
}
#[Route('/boutique_edit/{id}', name: 'boutique_edit')]
public function editboutique(Request $request, User $user, EntityManagerInterface $entityManager,  UserPasswordHasherInterface $passwordHasher): Response
{  
    $form = $this->createForm(ProfileFormType::class, $user);
    $form->add('modifier', SubmitType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted()) {
        $file = $form->get('Photo')->getData();
        if ($file) {
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('img_directory'),
                $fileName
            );
            $user->setImage($fileName);
        }
          // Update the user's password if a new password is provided
          $password = $form->get('password')->getData();
          if (!empty($password)) {
              $hashedPassword = $passwordHasher->hashPassword($user, $password);
              $user->setPassword($hashedPassword);
          }
        $entityManager->flush();

        return $this->redirectToRoute('boutique');
    }

    return $this->renderForm('client/editboutique.html.twig', ['form' => $form]);
}

#[Route('/agence_edit/{id}', name: 'agence_edit')]
public function editagence(Request $request, User $user, EntityManagerInterface $entityManager,  UserPasswordHasherInterface $passwordHasher): Response
{  
    $form = $this->createForm(ProfileFormType::class, $user);
    $form->add('modifier', SubmitType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted()) {
        $file = $form->get('Photo')->getData();
        if ($file) {
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('img_directory'),
                $fileName
            );
            $user->setImage($fileName);
        }
        $password = $form->get('password')->getData();
          if (!empty($password)) {
              $hashedPassword = $passwordHasher->hashPassword($user, $password);
              $user->setPassword($hashedPassword);
          }

        $entityManager->flush();

        return $this->redirectToRoute('agence');
    }

    return $this->renderForm('client/editagence.html.twig', ['form' => $form]);
}
#[Route('/famille_edit/{id}', name: 'famille_edit')]
public function editfamille(Request $request, User $user, EntityManagerInterface $entityManager,  UserPasswordHasherInterface $passwordHasher): Response
{  
    $form = $this->createForm(ProfileFormType::class, $user);
    $form->add('modifier', SubmitType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted()) {
        $file = $form->get('Photo')->getData();
        if ($file) {
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('img_directory'),
                $fileName
            );
            $user->setImage($fileName);
        }
        $password = $form->get('password')->getData();
          if (!empty($password)) {
              $hashedPassword = $passwordHasher->hashPassword($user, $password);
              $user->setPassword($hashedPassword);
          }
        $entityManager->flush();

        return $this->redirectToRoute('famille');
    }

    return $this->render('client/editfamille.html.twig', [
        'form' => $form->createView(),
        'user' => $user, // Pass the "user" object to the view
    ]);
}
#[Route(path:'/block/user/{id}', name: 'block_user')]
public function blockUser(Request $request, $id)
{
    $user = $this->entityManager->getRepository(User::class)->find($id);

    if (!$user) {
        throw $this->createNotFoundException('No user found for id '.$id);
    }

    $user->setBlocked(true);
    $this->entityManager->flush();

    // Pass a parameter to indicate whether the user is blocked or not
    return $this->redirectToRoute('display', ['blocked' => true]);
}

#[Route(path:'/user/{id}/qr-code', name: 'generate_qr_code')]
public function generateQrCodeForUser($id)
{
    // Get the user from the database
    $user = $this->entityManager->getRepository(User::class)->find($id);
    // Check if the user exists
    if (!$user) {
        throw $this->createNotFoundException('User not found');
    }

    // Generate the QR code
    $qrCode = new QrCode($user->getUsername());

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



