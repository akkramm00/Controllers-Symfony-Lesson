
<?php
//  Voici un Controller de base
namespace App\Controller;

use App\Repository\PictureRepository;
use Symfony\Bundle\FramworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFundation\Rsponse;
use Symfony\Compnent\Routing\Annotation\Route;

class PicturesController extends AbstractController
  {
    /**
    #[Route('/', name: 'app_pictures_index' , methods: ['GET'])]
    **/
    public function index(PicturesRepository $picturesRepository): Response
    {
      $allPictures = $picturesRepository->findAll();
      return $this->render('pictures/index.html.twig', [
                           'pictures' => $allPïctures
      ]);
    }
  }
?>