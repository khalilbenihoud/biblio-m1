<?php

namespace BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BibliothequeBundle\Entity\Exemplaire;
use BibliothequeBundle\Entity\Rayon;
use BibliothequeBundle\Form\ExemplaireType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Exemplaire controller.
 *
 */
class ExemplaireController extends Controller
{
    /**
     * Lists all Exemplaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $exemplaires = $em->getRepository('BibliothequeBundle:Exemplaire')->findAll();

        return $this->render('BibliothequeBundle:Exemplaire:index.html.twig', array(
            'exemplaires' => $exemplaires,
        ));
    }

    /**
     * Creates a new Exemplaire entity.
     *
     */
    public function newAction(Request $request)
    {
        $exemplaire = new Exemplaire();
        $form = $this->createForm('BibliothequeBundle\Form\ExemplaireType', $exemplaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            //On récupère le theme du livre sélectionné
            $themeL = $exemplaire->getLivre()->getThemeLivre();
            foreach ($themeL as $value) {
                $themeLivre = $value;
            }

            //On récupère le theme du rayon de l'étagère
            $themeRayon = $exemplaire->getEtagere()->getRayon();
            $themeRayon = explode(']', $themeRayon);
            $themeRayon = $themeRayon[2];
            
            //On les compare afin de n'enregistrer un exemplaire que si le theme livre = theme rayon
            if($themeLivre != $themeRayon){
                $message =  "Votre exemplaire n'a pas été enregistré. <br />Veuillez vérifier que le thème de votre livre correspond au thème du rayon dans lequel votre étagère se situe.";
                $message .= '<br /><a href="http://127.0.0.1:8000/exemplaire/new">Retour au formulaire</a>';
                return new Response("<html><body>$message</body></html>");
            }
            else{
                $em = $this->getDoctrine()->getManager();
                $em->persist($exemplaire);
                $em->flush();

                return $this->redirectToRoute('exemplaire_show', 
                            array('id' => $exemplaire->getId()));
            }
        }

        return $this->render('BibliothequeBundle:Exemplaire:new.html.twig', array(
            'exemplaire' => $exemplaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Exemplaire entity.
     *
     */
    public function showAction(Exemplaire $exemplaire)
    {
        $deleteForm = $this->createDeleteForm($exemplaire);

        return $this->render('BibliothequeBundle:Exemplaire:show.html.twig', array(
            'exemplaire' => $exemplaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Exemplaire entity.
     *
     */
    public function editAction(Request $request, Exemplaire $exemplaire)
    {
        $deleteForm = $this->createDeleteForm($exemplaire);
        $editForm = $this->createForm('BibliothequeBundle\Form\ExemplaireType', $exemplaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($exemplaire);
            $em->flush();

            return $this->redirectToRoute('exemplaire_edit', array('id' => $exemplaire->getId()));
        }

        return $this->render('BibliothequeBundle:Exemplaire:edit.html.twig', array(
            'exemplaire' => $exemplaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Exemplaire entity.
     *
     */
    public function deleteAction(Request $request, Exemplaire $exemplaire)
    {
        $form = $this->createDeleteForm($exemplaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($exemplaire);
            $em->flush();
        }

        return $this->redirectToRoute('exemplaire_index');
    }

    /**
     * Creates a form to delete a Exemplaire entity.
     *
     * @param Exemplaire $exemplaire The Exemplaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Exemplaire $exemplaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('exemplaire_delete', array('id' => $exemplaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
