<?php

namespace BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BibliothequeBundle\Entity\Lecteur;
use BibliothequeBundle\Form\LecteurType;

/**
 * Lecteur controller.
 *
 */
class LecteurController extends Controller
{
    /**
     * Lists all Lecteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lecteurs = $em->getRepository('BibliothequeBundle:Lecteur')->findAll();

        return $this->render('BibliothequeBundle:Lecteur:index.html.twig', array(
            'lecteurs' => $lecteurs,
        ));
    }

    /**
     * Creates a new Lecteur entity.
     *
     */
    public function newAction(Request $request)
    {
        $lecteur = new Lecteur();
        $form = $this->createForm('BibliothequeBundle\Form\LecteurType', $lecteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lecteur);
            $em->flush();

            return $this->redirectToRoute('lecteur_show', array('id' => $lecteur->getId()));
        }

        return $this->render('BibliothequeBundle:Lecteur:new.html.twig', array(
            'lecteur' => $lecteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Lecteur entity.
     *
     */
    public function showAction(Lecteur $lecteur)
    {
        $deleteForm = $this->createDeleteForm($lecteur);

        return $this->render('BibliothequeBundle:Lecteur:show.html.twig', array(
            'lecteur' => $lecteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Lecteur entity.
     *
     */
    public function editAction(Request $request, Lecteur $lecteur)
    {
        $deleteForm = $this->createDeleteForm($lecteur);
        $editForm = $this->createForm('BibliothequeBundle\Form\LecteurType', $lecteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lecteur);
            $em->flush();

            return $this->redirectToRoute('lecteur_edit', array('id' => $lecteur->getId()));
        }

        return $this->render('BibliothequeBundle:Lecteur:edit.html.twig', array(
            'lecteur' => $lecteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Lecteur entity.
     *
     */
    public function deleteAction(Request $request, Lecteur $lecteur)
    {
        $form = $this->createDeleteForm($lecteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lecteur);
            $em->flush();
        }

        return $this->redirectToRoute('lecteur_index');
    }

    /**
     * Creates a form to delete a Lecteur entity.
     *
     * @param Lecteur $lecteur The Lecteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lecteur $lecteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lecteur_delete', array('id' => $lecteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

   /*
    * Action pour la Recherche d'inscrit par une partie de son nom
    * *************************************************************
    */
    public function rechercherAction(Request $request)
    {
        $listeLecteurs="vide";
        $m= $request->request->get('motchercher');
        if($m) {
            $entityManager = $this->getDoctrine()->getManager();
            $repository1 = $entityManager->getRepository('BibliothequeBundle:Lecteur');
            $listeLecteurs = $repository1->findByNom($m);
        }
        return $this->render('BibliothequeBundle:Lecteur:View_rechercheParPartie.html.twig',
            array('listeLecteurs' => $listeLecteurs,
            ));

    }
}
