<?php

namespace App\Controller;

use App\Entity\LigneDuPagnier;
use App\Entity\Produit;
use App\Entity\User;
use App\Form\LigneDuPagnierType;
use App\Repository\LigneDuPagnierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ligne/du/pagnier")
 */
class LigneDuPagnierController extends AbstractController
{
    /**
     * @Route("/", name="ligne_du_pagnier_index", methods={"GET"})
     */
    public function index(LigneDuPagnierRepository $ligneDuPagnierRepository): Response
    {
        return $this->render('ligne_du_pagnier/index.html.twig', [
            'ligne_du_pagniers' => $ligneDuPagnierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ligne_du_pagnier_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ligneDuPagnier = new LigneDuPagnier();
        $form = $this->createForm(LigneDuPagnierType::class, $ligneDuPagnier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ligneDuPagnier);
            $entityManager->flush();

            return $this->redirectToRoute('ligne_du_pagnier_index');
        }

        return $this->render('ligne_du_pagnier/new.html.twig', [
            'ligne_du_pagnier' => $ligneDuPagnier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_du_pagnier_show", methods={"GET"})
     */
    public function show(LigneDuPagnier $ligneDuPagnier): Response
    {
        return $this->render('ligne_du_pagnier/show.html.twig', [
            'ligne_du_pagnier' => $ligneDuPagnier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ligne_du_pagnier_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LigneDuPagnier $ligneDuPagnier): Response
    {
        $form = $this->createForm(LigneDuPagnierType::class, $ligneDuPagnier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_du_pagnier_index');
        }

        return $this->render('ligne_du_pagnier/edit.html.twig', [
            'ligne_du_pagnier' => $ligneDuPagnier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_du_pagnier_delete", methods={"POST"})
     */
    public function delete(Request $request, LigneDuPagnier $ligneDuPagnier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneDuPagnier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ligneDuPagnier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ligne_du_pagnier_index');
    }


}
