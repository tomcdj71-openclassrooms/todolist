<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * This class represents the default controller for the application.
 * @category Controller
 */
#[Route('/')]
final class DefaultController extends AbstractController
{
    /**
     * This method represents the index action of the default controller.
     * It returns a Response object that renders the default index view.
     *
     * @return Response a Response object that renders the default index view
     */
    #[Route('', name: 'homepage')]
    public function indexAction(): Response
    {
        return $this->render('default/index.html.twig');
    }
}
