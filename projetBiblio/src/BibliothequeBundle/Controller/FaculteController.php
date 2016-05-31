<?php

namespace BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BibliothequeBundle\Entity\Faculte;
use BibliothequeBundle\Form\FaculteType;

/**
 * Faculte controller.
 *
 */
class FaculteController extends Controller
{
    /**
     * Lists all Faculte entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $facultes = $em->getRepository('BibliothequeBundle:Faculte')->findAll();

        return $this->render('BibliothequeBundle:Faculte:index.html.twig', array(
            'facultes' => $facultes,
        ));
    }

    /**
     * Creates a new Faculte entity.
     *
     */
    public function newAction(Request $request)
    {
        $faculte = new Faculte();
        $form = $this->createForm('BibliothequeBundle\Form\FaculteType', $faculte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($faculte);
            $em->flush();

            return $this->redirectToRoute('faculte_show', array('id' => $faculte->getId()));
        }

        return $this->render('BibliothequeBundle:Faculte:new.html.twig', array(
            'faculte' => $faculte,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Faculte entity.
     *
     */
    public function showAction(Faculte $faculte)
    {
        $deleteForm = $this->createDeleteForm($faculte);

        return $this->render('BibliothequeBundle:Faculte:show.html.twig', array(
            'faculte' => $faculte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Faculte entity.
     *
     */
    public function editAction(Request $request, Faculte $faculte)
    {
        $deleteForm = $this->createDeleteForm($faculte);
        $editForm = $this->createForm('BibliothequeBundle\Form\FaculteType', $faculte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($faculte);
            $em->flush();

            return $this->redirectToRoute('faculte_edit', array('id' => $faculte->getId()));
        }

        return $this->render('BibliothequeBundle:Faculte:edit.html.twig', array(
            'faculte' => $faculte,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Faculte entity.
     *
     */
    public function deleteAction(Request $request, Faculte $faculte)
    {
        $form = $this->createDeleteForm($faculte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($faculte);
            $em->flush();
        }

        return $this->redirectToRoute('faculte_index');
    }

    /**
     * Creates a form to delete a Faculte entity.
     *
     * @param Faculte $faculte The Faculte entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Faculte $faculte)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('faculte_delete', array('id' => $faculte->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
