<?php

namespace App\Controller;

use App\Repository\PictureRepository;
use Symfony\Bundle\FramworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
  {
    public function __construct(UserPasswordHaseherInterface $encoder)
    {
      $this ->encoder = $encoder;
    }

    #[Route('/users', name: 'user_list', methods: ['GET'])]
    public function listAction(UserRepository $userRepo)
    {
      $users = $userRepo->findAll();

      return $this -> render('user/list.html.twig', ['users' => $users]);
    }

    #[Route('/users/create', name: 'user_create')]
    public function createAction(Request $request, EntityManagerInterface $em)
    {
      $user = new User();
      $form =$this->createForm(UserType::class, $user);
      $form-> handlerRequest($request);

      if($form->isSubmitted() && $form->isValid())
      {
        $password = $this->encoder->hashPassword($user, $user->getPassword());
        $user->setPassword($password);
        $em ->persist($user);
        $em->flush();

        $this->addFlash('success', "L'utilisateur a bien été ajouté");
        return $this->redirectToRoute('user_list');
      }

      return $this->render('user/create.html.twig', ['form' => $form->createView()]);
    }
  
  }



?>