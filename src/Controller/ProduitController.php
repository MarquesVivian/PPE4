<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use MongoDB\Driver\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produit")
 */
class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="produit_index", methods={"GET"})
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="produit_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('produit_index');
        }

        return $this->render('produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produit_show", methods={"GET"})
     */
    public function show(Produit $produit): Response
    {
        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="produit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produit $produit): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produit_index');
        }

        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produit_delete", methods={"POST"})
     */
    public function delete(Request $request, Produit $produit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produit_index');
    }

    /**
     * @Route("/ajoutLigneDuPagnier/{id}", name="AjoutLigneDuPagnier", methods={"POST"})
     */
    public function ajoutlignedupagnier(Request $request,SessionInterface $session ,Produit $produit): Response
    {
        if($request->isMethod('POST') && $this->isCsrfTokenValid('ajoutLigneDuPagnier', $request->request->get('token'))){
            $lesproduits = $session->get('produits');
            if ($lesproduits == null){
                $lesproduits = [];
            }
            if (isset($lesproduits[$produit->getId()])){
                $leProduit=$lesproduits[$produit->getId()];
                $leProduit["quantiter"]++;
            }else{
                $leProduit=array("quantiter"=>1,"produit"=>$produit);
            }
            $lesproduits[$produit->getId()]=$leProduit;
            $session->set("produits",$lesproduits);
        }
        return $this->redirectToRoute("produit_index");
    }

    /**
     * @Route("/ajoutLigneDuPagnier2/{id}", name="AjoutLigneDuPagnier2", methods={"POST"})
     */
    public function ajoutlignedupagnier2(Request $request,SessionInterface $session ,Produit $produit): Response
    {
        if($request->isMethod('POST') && $this->isCsrfTokenValid('ajoutLigneDuPagnier2', $request->request->get('token'))){
            $lesproduits = $session->get('produits');
            if ($lesproduits == null){
                $lesproduits = [];
            }
            if (isset($lesproduits[$produit->getId()])){
                $leProduit=$lesproduits[$produit->getId()];
                $leProduit["quantiter"]++;
            }else{
                $leProduit=array("quantiter"=>1,"produit"=>$produit);
            }
            $lesproduits[$produit->getId()]=$leProduit;
            $session->set("produits",$lesproduits);
        }
        return $this->redirectToRoute("panier");
    }

    /**
     * @Route("/viderLigneDuPagnier", name="ViderLigneDuPagnier", methods={"POST"})
     */
    public function viderlignedupagnier(SessionInterface $session): Response
    {
        $session->set("produits",[]);
        return $this->redirectToRoute("produit_index");
    }

    /**
     * @Route("/panier", name="Panier", methods={"POST"})
     */
    public function afficherPanier(SessionInterface $session): Response
    {
        $lePanier = $session->get("produits");
        return $this->render('panier/index.html.twig',['panier' =>$lePanier]);
    }


}
