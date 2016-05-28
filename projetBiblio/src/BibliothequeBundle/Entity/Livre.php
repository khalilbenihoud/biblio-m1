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
    private $titreLivre;

    /**
     * @var string
     */
    private $noticeLivre;


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
     * Set titreLivre
     *
     * @param string $titreLivre
     *
     * @return Livre
     */
    public function setTitreLivre($titreLivre)
    {
        $this->titreLivre = $titreLivre;
    
        return $this;
    }

    /**
     * Get titreLivre
     *
     * @return string
     */
    public function getTitreLivre()
    {
        return $this->titreLivre;
    }

    /**
     * Set noticeLivre
     *
     * @param string $noticeLivre
     *
     * @return Livre
     */
    public function setNoticeLivre($noticeLivre)
    {
        $this->noticeLivre = $noticeLivre;
    
        return $this;
    }

    /**
     * Get noticeLivre
     *
     * @return string
     */
    public function getNoticeLivre()
    {
        return $this->noticeLivre;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $exemplaires;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $reserver;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $auteur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $theme_livre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->exemplaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reserver = new \Doctrine\Common\Collections\ArrayCollection();
        $this->auteur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->theme_livre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add exemplaire
     *
     * @param \BibliothequeBundle\Entity\Exemplaire $exemplaire
     *
     * @return Livre
     */
    public function addExemplaire(\BibliothequeBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaires[] = $exemplaire;
    
        return $this;
    }

    /**
     * Remove exemplaire
     *
     * @param \BibliothequeBundle\Entity\Exemplaire $exemplaire
     */
    public function removeExemplaire(\BibliothequeBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaires->removeElement($exemplaire);
    }

    /**
     * Get exemplaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExemplaires()
    {
        return $this->exemplaires;
    }

    /**
     * Add reserver
     *
     * @param \BibliothequeBundle\Entity\Reserver $reserver
     *
     * @return Livre
     */
    public function addReserver(\BibliothequeBundle\Entity\Reserver $reserver)
    {
        $this->reserver[] = $reserver;
    
        return $this;
    }

    /**
     * Remove reserver
     *
     * @param \BibliothequeBundle\Entity\Reserver $reserver
     */
    public function removeReserver(\BibliothequeBundle\Entity\Reserver $reserver)
    {
        $this->reserver->removeElement($reserver);
    }

    /**
     * Get reserver
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReserver()
    {
        return $this->reserver;
    }

    /**
     * Add auteur
     *
     * @param \BibliothequeBundle\Entity\Auteur $auteur
     *
     * @return Livre
     */
    public function addAuteur(\BibliothequeBundle\Entity\Auteur $auteur)
    {
        $this->auteur[] = $auteur;
    
        return $this;
    }

    /**
     * Remove auteur
     *
     * @param \BibliothequeBundle\Entity\Auteur $auteur
     */
    public function removeAuteur(\BibliothequeBundle\Entity\Auteur $auteur)
    {
        $this->auteur->removeElement($auteur);
    }

    /**
     * Get auteur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Add themeLivre
     *
     * @param \BibliothequeBundle\Entity\Theme $themeLivre
     *
     * @return Livre
     */
    public function addThemeLivre(\BibliothequeBundle\Entity\Theme $themeLivre)
    {
        $this->theme_livre[] = $themeLivre;
    
        return $this;
    }

    /**
     * Remove themeLivre
     *
     * @param \BibliothequeBundle\Entity\Theme $themeLivre
     */
    public function removeThemeLivre(\BibliothequeBundle\Entity\Theme $themeLivre)
    {
        $this->theme_livre->removeElement($themeLivre);
    }

    /**
     * Get themeLivre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getThemeLivre()
    {
        return $this->theme_livre;
    }
}
