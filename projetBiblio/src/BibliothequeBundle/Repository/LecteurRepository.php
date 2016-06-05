<?php

namespace BibliothequeBundle\Repository;

/**
 * LecteurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LecteurRepository extends \Doctrine\ORM\EntityRepository
{

    /*
     * Fonction pour la recherche d'un inscrit par une partie de son nom
     */
    public function FindByNom($nom)
    {
        $queryBuilder = $this->createQueryBuilder('l');
        $queryBuilder->where('l.nomLecteur LIKE :nom')
            ->setParameter('nom','%'.$nom.'%');

        return $queryBuilder->getQuery()->getResult();
    }
}
