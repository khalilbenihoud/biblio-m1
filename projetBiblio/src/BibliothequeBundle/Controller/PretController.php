<?php
/**
 * Created by PhpStorm.
 * User: khalilbenihoud
 * Date: 03/06/2016
 * Time: 23:06
 */

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\Archivage;
use BibliothequeBundle\Entity\Emprunter;
use BibliothequeBundle\Entity\Exemplaire;
use BibliothequeBundle\Entity\Lecteur;
use BibliothequeBundle\Entity\Reserver;
use BibliothequeBundle\Form\LecteurType;
use BibliothequeBundle\Form\EmprunterType;
use BibliothequeBundle\Form\LivreType;
use BibliothequeBundle\Entity\ExemplaireRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PretController extends Controller
{
    // FindAll des emprunts
    public function listePretAction(){
        $em = $this->getDoctrine()->getManager();
        // objet - toutes les emprunts qu'il ya dans la table meprunter
        $emprunter = $em->getRepository('BibliothequeBundle:Emprunter')->findAll();
        return $this->render('BibliothequeBundle:Pret:listePret.html.twig', array('emprunter'=>$emprunter));
    }

    public function listePretParLivreAction(Request $request){
        // c : mot clé qu'on tape dans la recherche
        // request = GET de php, get d'un URL
        // $query = POST
        // on recupere la valeur et on la stock dans mot
        $mot = $request->request->get('c');
        $select = $request->request->get('s'); // select si c'est livre ou lecteur
        if($select == "Livre"){
            $em = $this->getDoctrine()->getManager(); // connexion avec la BDD et entités
            $repository = $em->getRepository('BibliothequeBundle:Emprunter'); // chemin est emprunter
            $emprunter = $repository->findByTitreLivre($mot); // on stock les livres dans emprunter
            return $this->render('BibliothequeBundle:Pret:listePret.html.twig',array('emprunter'=>$emprunter));
        }
        else{
            return $this->redirectToRoute('bibliotheque_pret_listeParLecteur',array('mot'=>$mot));
        }
    }
    public function listePretParLecteurAction($mot){
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BibliothequeBundle:Emprunter');
        $emprunter = $repository->findByNomLecteur($mot);
        return $this->render('BibliothequeBundle:Pret:listePret.html.twig',array('emprunter'=>$emprunter));
    }

    public function consulteLivreDispoAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BibliothequeBundle:Exemplaire');
        $livre= $repository->findByLivreDispo();
        return $this->render('BibliothequeBundle:Pret:listeLivreDispo.html.twig',array('livres'=>$livre));
    }

    public function ajoutPretLivreAction(Request $request){
        $id=$request->query->get('id'); // on récupere id du livre et on la stock dans ID
        $emprunter = new Emprunter(); // on créé un objet emprunter pour y mettre dak le livre emprunté( qu'il ne soit plus disponible )
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('BibliothequeBundle:Exemplaire');
        $exemplaire = $repository->find($id); // infos exemplaire a partir de l'ID quon va recuperer de l'entité exemplaire
        $date = new \DateTime();
        $form = $this->createFormBuilder($emprunter)

            ->add('emprunteur', EntityType::class,
                array ('label' => 'Nom du Lecteur',
                    'class' => 'BibliothequeBundle:Lecteur',
                    'choice_label' => 'nomLecteur',
                    'required' => true,
                    'attr'=> array('class'=>'form-control'),
                ))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $date = new \DateTime(); // on stock la date du jour ( du système )
            $emprunter->setDateDebut(new \DateTime()); // on stock dans datedebut la date du systeme
            $dateFin = $date->modify('+15 day'); // pour quapres 15j

            $repository = $em->getRepository('BibliothequeBundle:Reserver');
            $e = $repository->findBy(array('livre'=>$id));

            // on voit si livre déjà prêté
            if($e){
                $dateReservation=$e[0]->getDateReservation();
            }
            else{
                $dateReservation=null;
            }
            $flag=true;
            if($dateReservation){
                if($dateFin>$dateReservation){
                    $flag=false;
                }
            }

            if($flag){

                $entityManager = $this->getDoctrine()->getManager();
                $emprunter->setExemplaire($exemplaire);
                $lecteur = $emprunter->getEmprunteur();
                $quota  = $this->CheckQuotaLecteur($lecteur);

                $emprunter->setDateFin($dateFin);
                if($quota){

                    $entityManager->persist($emprunter);
                    $entityManager->flush();
                    $request->getSession()->getFlashBag()->add('notice', 'Le prêt a été enregistré avec succès pour '.' '.$lecteur->getNomLecteur().' '.$lecteur->getPrenomLecteur().'. ');
                    return $this->redirectToRoute('bibliotheque_pret_listeLivreDispo');
                }
                else{
                    $request->getSession()->getFlashBag()->add('notice', 'Le quota de prêt a été dépassé pour'.' '.
                        $lecteur->getNomLecteur().' '.$lecteur->getPrenomLecteur().'. '.
                        'Cycle d\'étude :'.' '.$lecteur->getCycleLecteur().'. '.
                        'Nombre d\'emprunts en cours :'.count($lecteur->getEmprunter()).' livres');
                }
            }
            else{
                $request->getSession()->getFlashBag()->add('notice', 'Le livre est déjà réservé');
            }
        }
        return $this->render('BibliothequeBundle:Pret:ajoutPretLivre.html.twig', array('form' => $form->createView()));

    }

    public function CheckQuotaLecteur(Lecteur $lecteur)
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
}