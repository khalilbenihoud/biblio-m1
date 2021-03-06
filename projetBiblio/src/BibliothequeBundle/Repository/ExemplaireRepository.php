<?php

namespace BibliothequeBundle\Repository;

/**
 * ExemplaireRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ExemplaireRepository extends \Doctrine\ORM\EntityRepository
{
    // on recupere les exemplaires empruntés qui ont un ID NULL
    // SI NULL c'est qu'il n'est pas emprunté
    public function findByLivreDispo(){
        $livre = $this->createQueryBuilder('e');
        $livre->leftJoin('e.emprunter','em')
            ->where('em.id IS NULL');
        return $livre->getQuery()->getResult();
    }
	public function etagereTropPleine($idEtagere) {
		$query = $this->getEntityManager()->createQueryBuilder('e')
		->select('COUNT(e.id)')
		->from('BibliothequeBundle:Exemplaire', 'e')
		->where('e.etagere = :idEtagere')
		->setParameter('idEtagere', $idEtagere);

		$nbExemplaire = $query->getQuery()->getSingleScalarResult();

		if ($nbExemplaire <= 100)
			return false;
		else
			return true;
	}

	public function listeExemplaireInEtagere($idLivre, $idEtagere) {
		$query = $this->getEntityManager()->createQueryBuilder('e')
		->select('e')
		->from('BibliothequeBundle:Exemplaire', 'e')
		->where('e.livre = :idLivre')
		->setParameter('idLivre', $idLivre)
		->andWhere('e.etagere = :idEtagere')
		->setParameter('idEtagere', $idEtagere);

		return $query->getQuery()->getResult();
	}

	public function getNumEtagereMax(){
		$query = $this->getEntityManager()->createQueryBuilder('e')
		->select('max(e.numeroEtagere)')
		->from('BibliothequeBundle:Etagere', 'e');

		return $query->getQuery()->getSingleScalarResult();
	}

	public function getNbExemplaire($idLivre){
		$query = $this->getEntityManager()->createQueryBuilder('e')
		->select('COUNT(e.id)')
		->from('BibliothequeBundle:Exemplaire', 'e')
		->where('e.livre = :idLivre')
		->setParameter('idLivre', $idLivre);

		return $query->getQuery()->getSingleScalarResult();
	}
}
