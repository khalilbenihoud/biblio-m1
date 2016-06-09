<?php

namespace BibliothequeBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Faculte
 */
class Faculte
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $designationFaculte;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set designationFaculte
     *
     * @param string $designationFaculte
     *
     * @return Faculte
     */
    public function setDesignationFaculte($designationFaculte)
    {
        $this->designationFaculte = $designationFaculte;
    
        return $this;
    }

    /**
     * Get designationFaculte
     *
     * @return string
     */
    public function getDesignationFaculte()
    {
        return $this->designationFaculte;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $etudiants;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etudiants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add etudiant
     *
     * @param \BibliothequeBundle\Entity\Lecteur $etudiant
     *
     * @return Faculte
     */
    public function addEtudiant(\BibliothequeBundle\Entity\Lecteur $etudiant)
    {
        $this->etudiants[] = $etudiant;
    
        return $this;
    }

    /**
     * Remove etudiant
     *
     * @param \BibliothequeBundle\Entity\Lecteur $etudiant
     */
    public function removeEtudiant(\BibliothequeBundle\Entity\Lecteur $etudiant)
    {
        $this->etudiants->removeElement($etudiant);
    }

    /**
     * Get etudiants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtudiants()
    {
        return $this->etudiants;
    }
    public function __toString()
    {
        return $this->getDesignationFaculte();
    }
}
