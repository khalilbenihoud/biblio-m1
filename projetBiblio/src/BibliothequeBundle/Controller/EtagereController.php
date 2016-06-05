<?php

namespace BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BibliothequeBundle\Entity\Etagere;
use BibliothequeBundle\Form\EtagereType;

/**
 * Etagere controller.
 *
 */
class EtagereController extends Controller
{
    /**
     * Lists all Etagere entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etageres = $em->getRepository('BibliothequeBundle:Etagere')->findAll();

        return $this->render('BibliothequeBundle:Etagere:index.html.twig', array(
            'etageres' => $etageres,
        ));
    }

    /**
     * Creates a new Etagere entity.
     *
     */
    public function newAction(Request $request)
    {
        $etagere = new Etagere();
        $form = $this->createForm('BibliothequeBundle\Form\EtagereType', $etagere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etagere);
            $em->flush();

            return $this->redirectToRoute('etagere_show', array('id' => $etagere->getId()));
        }

        return $this->render('BibliothequeBundle:Etagere:new.html.twig', array(
            'etagere' => $etagere,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Etagere entity.
     *
     */
    public function showAction(Etagere $etagere)
    {
        $deleteForm = $this->createDeleteForm($etagere);

        return $this->render('BibliothequeBundle:Etagere:show.html.twig', array(
            'etagere' => $etagere,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Etagere entity.
     *
     */
    public function editAction(Request $request, Etagere $etagere)
    {
        $deleteForm = $this->createDeleteForm($etagere);
        $editForm = $this->createForm('BibliothequeBundle\Form\EtagereType', $etagere);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etagere);
            $em->flush();

            return $this->redirectToRoute('etagere_edit', array('id' => $etagere->getId()));
        }

        return $this->render('BibliothequeBundle:Etagere:edit.html.twig', array(
            'etagere' => $etagere,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Etagere entity.
     *
     */
    public function deleteAction(Request $request, Etagere $etagere)
    {
        $form = $this->createDeleteForm($etagere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $etagereRepository = $em->getRepository('BibliothequeBundle:Etagere');
            $nbExemplaire = $etagereRepository->getNbExemplaire($etagere->getId());

            if($nbExemplaire != 0){
                return $this->redirectToRoute('delete_error');
            }
            else{
                $em->remove($etagere);
                $em->flush();
                return $this->redirectToRoute('etagere_index');
            }
        }
    }

    /**
     * Creates a form to delete a Etagere entity.
     *
     * @param Etagere $etagere The Etagere entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etagere $etagere)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etagere_delete', array('id' => $etagere->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function testNbExemplaireAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $etagereRepository = $em->getRepository('BibliothequeBundle:Etagere');

        $nbExemplaire = $etagereRepository->getNbExemplaire($id);

        return $this->render('BibliothequeBundle:Etagere:nbExemplaire.html.twig', array(
            'nbExemplaire' => $nbExemplaire,
        ));
    }

    public function delErrorAction(){
        return $this->render('BibliothequeBundle:Etagere:delError.html.twig');
    }
}
