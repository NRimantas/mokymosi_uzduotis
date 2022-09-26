<?php

namespace App\Controller;

use App\Entity\Applicant;
use App\Form\ApplicantType;
use App\Repository\ApplicantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicantController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('applicant/index.html.twig');
    }
    
    #[Route('/application', name: 'app_application')]
    public function add(Request $request , ApplicantRepository $applicants): Response
    {
        $form = $this->createForm(ApplicantType::class, new Applicant());
        $form = $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $applicant = $form->getData();
            $applicants->add($applicant, true);

            return $this->redirectToRoute('app_index');
            // TODO:
            // ADD FLASH MESSAGE
            // REDIRECT TO ANOTHER ROUTE

        }

        return $this->renderForm('applicant/add.html.twig', [
            'form' => $form
        ]);
    }
}
