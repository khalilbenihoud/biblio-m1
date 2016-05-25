<?php

namespace BibliothequeBundle\Entity;

/**
 * Auteur
 */
class Auteur
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Auteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Auteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ecrit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ecrit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ecrit
     *
     * @param \BibliothequeBundle\Entity\Livre $ecrit
     *
     * @return Auteur
     */
    public function addEcrit(\BibliothequeBundle\Entity\Livre $ecrit)
    {
        $this->ecrit[] = $ecrit;

        return $this;
    }

    /**
     * Remove ecrit
     *
     * @param \BibliothequeBundle\Entity\Livre $ecrit
     */
    public function removeEcrit(\BibliothequeBundle\Entity\Livre $ecrit)
    {
        $this->ecrit->removeElement($ecrit);
    }

    /**
     * Get ecrit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEcrit()
    {
        return $this->ecrit;
    }
}
