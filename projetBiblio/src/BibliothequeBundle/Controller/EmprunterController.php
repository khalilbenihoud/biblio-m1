<?php

namespace BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BibliothequeBundle\Entity\Emprunter;
use BibliothequeBundle\Form\EmprunterType;

/**
 * Emprunter controller.
 *
 */
class EmprunterController extends Controller
{
    /**
     * Lists all Emprunter entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $emprunters = $em->getRepository('BibliothequeBundle:Emprunter')->findAll();

        return $this->render('BibliothequeBundle:Emprunter:index.html.twig', array(
            'emprunters' => $emprunters,
        ));
    }

    /**
     * Creates a new Emprunter entity.
     *
     */
    public function newAction(Request $request)
    {
        $emprunter = new Emprunter();
        $form = $this->createForm('BibliothequeBundle\Form\EmprunterType', $emprunter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($emprunter);
            $em->flush();

            return $this->redirectToRoute('emprunter_show', array('id' => $emprunter->getId()));
        }

        return $this->render('BibliothequeBundle:Emprunter:new.html.twig', array(
            'emprunter' => $emprunter,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Emprunter entity.
     *
     */
    public function showAction(Emprunter $emprunter)
    {
        $deleteForm = $this->createDeleteForm($emprunter);

        return $this->render('BibliothequeBundle:Emprunter:show.html.twig', array(
            'emprunter' => $emprunter,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Emprunter entity.
     *
     */
    public function editAction(Request $request, Emprunter $emprunter)
    {
        $deleteForm = $this->createDeleteForm($emprunter);
        $editForm = $this->createForm('BibliothequeBundle\Form\EmprunterType', $emprunter);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($emprunter);
            $em->flush();

            return $this->redirectToRoute('emprunter_edit', array('id' => $emprunter->getId()));
        }

        return $this->render('BibliothequeBundle:Emprunter:edit.html.twig', array(
            'emprunter' => $emprunter,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Emprunter entity.
     *
     */
    public function deleteAction(Request $request, Emprunter $emprunter)
    {
        $form = $this->createDeleteForm($emprunter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($emprunter);
            $em->flush();
        }

        return $this->redirectToRoute('emprunter_index');
    }

    /**
     * Creates a form to delete a Emprunter entity.
     *
     * @param Emprunter $emprunter The Emprunter entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Emprunter $emprunter)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emprunter_delete', array('id' => $emprunter->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
