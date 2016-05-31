<?php

namespace BibliothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use BibliothequeBundle\Entity\Livre;
use BibliothequeBundle\Form\LivreType;

/**
 * Livre controller.
 *
 */
class LivreController extends Controller
{
    /**
     * Lists all Livre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $livres = $em->getRepository('BibliothequeBundle:Livre')->findAll();

        return $this->render('BibliothequeBundle:Livre:index.html.twig', array(
            'livres' => $livres,
        ));
    }

    /**
     * Creates a new Livre entity.
     *
     */
    public function newAction(Request $request)
    {
        $livre = new Livre();
        $form = $this->createForm('BibliothequeBundle\Form\LivreType', $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livre);
            $em->flush();

            return $this->redirectToRoute('livre_show', array('id' => $livre->getId()));
        }

        return $this->render('BibliothequeBundle:Livre:new.html.twig', array(
            'livre' => $livre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Livre entity.
     *
     */
    public function showAction(Livre $livre)
    {
        $deleteForm = $this->createDeleteForm($livre);

        return $this->render('BibliothequeBundle:Livre:show.html.twig', array(
            'livre' => $livre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Livre entity.
     *
     */
    public function editAction(Request $request, Livre $livre)
    {
        $deleteForm = $this->createDeleteForm($livre);
        $editForm = $this->createForm('BibliothequeBundle\Form\LivreType', $livre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livre);
            $em->flush();

            return $this->redirectToRoute('livre_show', array('id' => $livre->getId()));
        }

        return $this->render('BibliothequeBundle:Livre:edit.html.twig', array(
            'livre' => $livre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Livre entity.
     *
     */
    public function deleteAction(Request $request, Livre $livre)
    {
        $form = $this->createDeleteForm($livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($livre);
            $em->flush();
        }

        return $this->redirectToRoute('livre_index');
    }

    /**
     * Creates a form to delete a Livre entity.
     *
     * @param Livre $livre The Livre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Livre $livre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('livre_delete', array('id' => $livre->getId())))
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
				return $this->redirect($this->get('router')->generate('livre_search_result', array('search' => $search)));
			}
        }
		
        return $this->render('BibliothequeBundle:Livre:search.html.twig', array('form'=>$form->createView()));
	}
	
	public function search_resultAction($search)
	{
		$em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository('BibliothequeBundle:Livre');

        $livres = $repo->createQueryBuilder('l')
					->leftJoin('l.theme_livre', 't')
					->leftJoin('l.auteur', 'a')
                    ->where('l.titreLivre LIKE :search OR t.descriptionTheme LIKE :search OR a.nomAuteur LIKE :search OR a.prenomAuteur LIKE :search')
                    ->setParameter('search', '%'.$search.'%')
                    ->getQuery()
                    ->getResult();
        return $this->render('BibliothequeBundle:Livre:search_result.html.twig', array(
            'livres' => $livres,
        ));
	}
}
