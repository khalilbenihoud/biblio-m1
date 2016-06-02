<?php

namespace BibliothequeBundle\Entity;

/**
 * Etagere
 */
class Etagere
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $numeroEtagere;


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
     * Set numeroEtagere
     *
     * @param integer $numeroEtagere
     *
     * @return Etagere
     */
    public function setNumeroEtagere($numeroEtagere)
    {
        $this->numeroEtagere = $numeroEtagere;
    
        return $this;
    }

    /**
     * Get numeroEtagere
     *
     * @return integer
     */
    public function getNumeroEtagere()
    {
        return $this->numeroEtagere;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $exemplaires_ranges;

    /**
     * @var \BibliothequeBundle\Entity\Rayon
     */
    private $rayon;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->exemplaires_ranges = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add exemplairesRange
     *
     * @param \BibliothequeBundle\Entity\Exemplaire $exemplairesRange
     *
     * @return Etagere
     */
    public function addExemplairesRange(\BibliothequeBundle\Entity\Exemplaire $exemplairesRange)
    {
        $this->exemplaires_ranges[] = $exemplairesRange;
    
        return $this;
    }

    /**
     * Remove exemplairesRange
     *
     * @param \BibliothequeBundle\Entity\Exemplaire $exemplairesRange
     */
    public function removeExemplairesRange(\BibliothequeBundle\Entity\Exemplaire $exemplairesRange)
    {
        $this->exemplaires_ranges->removeElement($exemplairesRange);
    }

    /**
     * Get exemplairesRanges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExemplairesRanges()
    {
        return $this->exemplaires_ranges;
    }

    /**
     * Set rayon
     *
     * @param \BibliothequeBundle\Entity\Rayon $rayon
     *
     * @return Etagere
     */
    public function setRayon(\BibliothequeBundle\Entity\Rayon $rayon = null)
    {
        $this->rayon = $rayon;
    
        return $this;
    }

    /**
     * Get rayon
     *
     * @return \BibliothequeBundle\Entity\Rayon
     */
    public function getRayon()
    {
        return $this->rayon;
    }

    public function __toString()
    {
        return $this->getRayon().' - '.'Etagère : '.$this->getNumeroEtagere();
    }
}
