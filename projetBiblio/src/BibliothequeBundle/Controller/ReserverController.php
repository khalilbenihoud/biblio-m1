<?php

namespace BibliothequeBundle\Controller;

use Proxies\__CG__\BibliothequeBundle\Entity\Lecteur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BibliothequeBundle\Entity\Reserver;
use BibliothequeBundle\Entity\Emprunter;
use BibliothequeBundle\Form\ReserverType;
use BibliothequeBundle\Entity\ExemplaireRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

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
     * Réservation d'un livre indisponible appel dans la liste des emprunt
     */

    public function ajoutReservationLivreIndispoAction(Request $request){

        $idLivre=$request->query->get('idLivre'); //id exemplaire à reservé
        $id=$request->query->get('id');  // id de l'emprunt
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BibliothequeBundle:Reserver');
        $e = $repository->findBy(array('livre'=>$idLivre));
        $repository = $em->getRepository('BibliothequeBundle:Emprunter');
        $emprunt = $repository->find($id);
        $ecteur = $emprunt->getEmprunteur();
        $quota = $this->LimitReservationLecteur($ecteur);
        if(!$e){
            $reserver = new Reserver();
            $repository = $em->getRepository('BibliothequeBundle:Exemplaire');
            $exemplaire = $repository->find($idLivre);
            $form = $this->createFormBuilder($reserver)
                ->add('lecteur', EntityType::class,
                    array ('label' => 'Nom du Lecteur',
                        'class' => 'BibliothequeBundle:Lecteur',
                        'choice_label' => 'nomLecteur',
                        'required' => true,
                        'attr'=> array('class'=>'form-control'),
                    ))
                ->add('dateReservation',DateType::class,array('required' => false,
                    'widget' =>'single_text',
                    'format'=>'yyyy-MM-dd',
                    'required' => true,
                    'attr'=>array('class'=>'form-control'),
                ))
                ->getForm();
            $form->handleRequest($request);
            if ($form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                if($reserver->getDateReservation()>$emprunt->getDateFin() && $quota ){
                    //vérification si la date de la réservation
                    // dépasse la date de retoure et vérification du quota
                    $reserver->setLivre($exemplaire);
                    $entityManager->persist($reserver);
                    $entityManager->flush();
                    $request->getSession()->getFlashBag()->add('notice', 'Reservation bien enregistrée.');
                    return $this->redirectToRoute('bibliotheque_pret_liste');
                }
                else{
                    $request->getSession()->getFlashBag()->add('alerte', 'Réservation impossible.');
                    return $this->redirectToRoute('bibliotheque_pret_liste');
                }
            }
            return $this->render('BibliothequeBundle:Reserver:ajoutReservationLivre.html.twig', array('form' => $form->createView()));
        }
        else{
            $request->getSession()->getFlashBag()->add('alerte', 'ce livre est deja réserver');
            return $this->redirectToRoute('bibliotheque_pret_liste');
        }
    }
    /**
     * fonction annuler réservation dans la situation des pret et reservation
     */

    public function annulerReservationAction(Request $request)
    {
        $id=$request->query->get('id');
        $idLecteur = $request->get('idlecteur');
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BibliothequeBundle:Reserver');
        $reserver = $repository->find($id);
        $em->remove($reserver);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Réservation annuler');
        return $this->redirectToRoute('situationpret', array('id' => $idLecteur ));
    }

    /**
     * fonction pour verifier si le lecteur peux encore faire un emprunt
     */
    public function LimitReservationLecteur(Lecteur $lecteur)
    {
        $quota = true;
        $cycleLecteur = $lecteur->getCycleLecteur();
        $emprunter   = $lecteur->getEmprunter();
        $nombreEmprunt = count($emprunter);
        if($cycleLecteur==1){
            if($nombreEmprunt>=5){
                $quota=false;
            }
        }
        return $quota;
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
