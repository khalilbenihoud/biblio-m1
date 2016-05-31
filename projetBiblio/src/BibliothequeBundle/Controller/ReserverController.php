<?php

namespace BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BibliothequeBundle\Entity\Reserver;
use BibliothequeBundle\Form\ReserverType;

/**
 * Reserver controller.
 *
 */
class ReserverController extends Controller
{
    /**
     * Lists all Reserver entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservers = $em->getRepository('BibliothequeBundle:Reserver')->findAll();

        return $this->render('BibliothequeBundle:Reserver:index.html.twig', array(
            'reservers' => $reservers,
        ));
    }

    /**
     * Creates a new Reserver entity.
     *
     */
    public function newAction(Request $request)
    {
        $reserver = new Reserver();
        $form = $this->createForm('BibliothequeBundle\Form\ReserverType', $reserver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reserver);
            $em->flush();

            return $this->redirectToRoute('reserver_show', array('id' => $reserver->getId()));
        }

        return $this->render('BibliothequeBundle:Reserver:new.html.twig', array(
            'reserver' => $reserver,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Reserver entity.
     *
     */
    public function showAction(Reserver $reserver)
    {
        $deleteForm = $this->createDeleteForm($reserver);

        return $this->render('BibliothequeBundle:Reserver:show.html.twig', array(
            'reserver' => $reserver,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Reserver entity.
     *
     */
    public function editAction(Request $request, Reserver $reserver)
    {
        $deleteForm = $this->createDeleteForm($reserver);
        $editForm = $this->createForm('BibliothequeBundle\Form\ReserverType', $reserver);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reserver);
            $em->flush();

            return $this->redirectToRoute('reserver_edit', array('id' => $reserver->getId()));
        }

        return $this->render('BibliothequeBundle:Reserver:edit.html.twig', array(
            'reserver' => $reserver,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Reserver entity.
     *
     */
    public function deleteAction(Request $request, Reserver $reserver)
    {
        $form = $this->createDeleteForm($reserver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reserver);
            $em->flush();
        }

        return $this->redirectToRoute('reserver_index');
    }

    /**
     * Creates a form to delete a Reserver entity.
     *
     * @param Reserver $reserver The Reserver entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reserver $reserver)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reserver_delete', array('id' => $reserver->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
