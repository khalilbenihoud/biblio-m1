<?php

namespace BibliothequeBundle\Entity;

/**
 * Livre
 */
class Livre
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Livre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }
    /**
     * @var \BibliothequeBundle\Entity\Auteur
     */
    private $ecritPar;


    /**
     * Set ecritPar
     *
     * @param \BibliothequeBundle\Entity\Auteur $ecritPar
     *
     * @return Livre
     */
    public function setEcritPar(\BibliothequeBundle\Entity\Auteur $ecritPar = null)
    {
        $this->ecritPar = $ecritPar;

        return $this;
    }

    /**
     * Get ecritPar
     *
     * @return \BibliothequeBundle\Entity\Auteur
     */
    public function getEcritPar()
    {
        return $this->ecritPar;
    }
}
