<?php

namespace BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use BibliothequeBundle\Entity\Auteur;
use BibliothequeBundle\Form\AuteurType;

/**
 * Auteur controller.
 *
 */
class AuteurController extends Controller
{
    /**
     * Lists all Auteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $auteurs = $em->getRepository('BibliothequeBundle:Auteur')->findAll();

        return $this->render('BibliothequeBundle:Auteur:index.html.twig', array(
            'auteurs' => $auteurs,
        ));
    }

    /**
     * Creates a new Auteur entity.
     *
     */
    public function newAction(Request $request)
    {
        $auteur = new Auteur();
        $form = $this->createForm('BibliothequeBundle\Form\AuteurType', $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($auteur);
            $em->flush();

            return $this->redirectToRoute('auteur_show', array('id' => $auteur->getId()));
        }

        return $this->render('BibliothequeBundle:Auteur:new.html.twig', array(
            'auteur' => $auteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Auteur entity.
     *
     */
    public function showAction(Auteur $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);

        return $this->render('BibliothequeBundle:Auteur:show.html.twig', array(
            'auteur' => $auteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Auteur entity.
     *
     */
    public function editAction(Request $request, Auteur $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);
        $editForm = $this->createForm('BibliothequeBundle\Form\AuteurType', $auteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($auteur);
            $em->flush();

            return $this->redirectToRoute('auteur_show', array('id' => $auteur->getId()));
        }

        return $this->render('BibliothequeBundle:Auteur:edit.html.twig', array(
            'auteur' => $auteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Auteur entity.
     *
     */
    public function deleteAction(Request $request, Auteur $auteur)
    {
        $form = $this->createDeleteForm($auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($auteur);
            $em->flush();
        }

        return $this->redirectToRoute('auteur_index');
    }


    /**
     * Creates a form to delete a Auteur entity.
     *
     * @param Auteur $auteur The Auteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Auteur $auteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('auteur_delete', array('id' => $auteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
	
	public function searchAction(Request $request)
	{
		$form = $this->createFormBuilder()
			->add('search', TextType::class, array(
				'required' => true,
				'label'	=> 'Recherche : '
				)
			)
			->add('Rechercher', SubmitType::class)
			->getForm();
		
        $form->handleRequest($request);
		
        if ($form->isValid()) {
            $data = $form->getData();
            $search = $data['search'];
            
			if (!empty($search) && strlen($search) >= 1)
			{
				return $this->redirect($this->get('router')->generate('auteur_search_result', array('search' => $search)));
			}
        }
		
        return $this->render('BibliothequeBundle:Auteur:search.html.twig', array('form'=>$form->createView()));
	}
	
	public function search_resultAction($search)
	{
		$em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository('BibliothequeBundle:Auteur');

        $auteurs = $repo->createQueryBuilder('a')
                    ->where('a.nomAuteur LIKE :search OR a.prenomAuteur LIKE :search')
                    ->setParameter('search', '%'.$search.'%')
                    ->getQuery()
                    ->getResult();
        return $this->render('BibliothequeBundle:Auteur:search_result.html.twig', array(
            'auteurs' => $auteurs,
        ));
	}

}


