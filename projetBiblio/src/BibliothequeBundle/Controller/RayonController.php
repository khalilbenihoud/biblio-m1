<?php

namespace BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BibliothequeBundle\Entity\Rayon;
use BibliothequeBundle\Form\RayonType;

/**
 * Rayon controller.
 *
 */
class RayonController extends Controller
{
    /**
     * Lists all Rayon entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rayons = $em->getRepository('BibliothequeBundle:Rayon')->findAll();

        return $this->render('BibliothequeBundle:Rayon:index.html.twig', array(
            'rayons' => $rayons,
        ));
    }

    /**
     * Creates a new Rayon entity.
     *
     */
    public function newAction(Request $request)
    {
        $rayon = new Rayon();
        $form = $this->createForm('BibliothequeBundle\Form\RayonType', $rayon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rayon);
            $em->flush();

            return $this->redirectToRoute('rayon_show', array('id' => $rayon->getId()));
        }

        return $this->render('BibliothequeBundle:Rayon:new.html.twig', array(
            'rayon' => $rayon,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Rayon entity.
     *
     */
    public function showAction(Rayon $rayon)
    {
        $deleteForm = $this->createDeleteForm($rayon);

        return $this->render('BibliothequeBundle:Rayon:show.html.twig', array(
            'rayon' => $rayon,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Rayon entity.
     *
     */
    public function editAction(Request $request, Rayon $rayon)
    {
        $deleteForm = $this->createDeleteForm($rayon);
        $editForm = $this->createForm('BibliothequeBundle\Form\RayonType', $rayon);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rayon);
            $em->flush();

            return $this->redirectToRoute('rayon_edit', array('id' => $rayon->getId()));
        }

        return $this->render('BibliothequeBundle:Rayon:edit.html.twig', array(
            'rayon' => $rayon,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Rayon entity.
     *
     */
    public function deleteAction(Request $request, Rayon $rayon)
    {
        $form = $this->createDeleteForm($rayon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rayon);
            $em->flush();
        }

        return $this->redirectToRoute('rayon_index');
    }

    /**
     * Creates a form to delete a Rayon entity.
     *
     * @param Rayon $rayon The Rayon entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rayon $rayon)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rayon_delete', array('id' => $rayon->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
