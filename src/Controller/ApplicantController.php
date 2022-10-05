<?php

namespace App\Controller;

use App\Entity\Applicant;
use App\Form\ApplicantType;
use App\Repository\ApplicantRepository;
use App\Repository\ProjectToolRepository;
use App\Repository\ToolMeasureRepository;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApplicantController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('applicant/index.html.twig');
    }

    #[Route('/application', name: 'app_application')]
    public function add(Request $request, ApplicantRepository $applicants, ToolMeasureRepository $toolMeasures, ProjectToolRepository $projectTools): Response
    {
        $form = $this->createForm(ApplicantType::class, new Applicant());
        $form = $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $applicant = $form->getData();
            $applicant->setCreatedAt(new DateTimeImmutable());
            $applicant->setUpdatedAt(new DateTimeImmutable());
            $applicants->add($applicant, true);

            $this->addFlash('success', 'Forma buvo sėkmingai užpildyta!');



            return $this->redirectToRoute('app_index');
        }

        return $this->renderForm('applicant/add.html.twig', [
            'form' => $form,
            'projectTools' => $projectTools->findAll(),
            'toolMeasures' => $toolMeasures->findAll(),


        ]);
    }
}
