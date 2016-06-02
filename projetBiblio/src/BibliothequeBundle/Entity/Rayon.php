<?php

namespace BibliothequeBundle\Entity;

/**
 * Rayon
 */
class Rayon
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $designationRayon;


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
     * Set designationRayon
     *
     * @param string $designationRayon
     *
     * @return Rayon
     */
    public function setDesignationRayon($designationRayon)
    {
        $this->designationRayon = $designationRayon;
    
        return $this;
    }

    /**
     * Get designationRayon
     *
     * @return string
     */
    public function getDesignationRayon()
    {
        return $this->designationRayon;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $etageres;

    /**
     * @var \BibliothequeBundle\Entity\Theme
     */
    private $theme_rayon;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etageres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add etagere
     *
     * @param \BibliothequeBundle\Entity\Etagere $etagere
     *
     * @return Rayon
     */
    public function addEtagere(\BibliothequeBundle\Entity\Etagere $etagere)
    {
        $this->etageres[] = $etagere;
    
        return $this;
    }

    /**
     * Remove etagere
     *
     * @param \BibliothequeBundle\Entity\Etagere $etagere
     */
    public function removeEtagere(\BibliothequeBundle\Entity\Etagere $etagere)
    {
        $this->etageres->removeElement($etagere);
    }

    /**
     * Get etageres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtageres()
    {
        return $this->etageres;
    }

    /**
     * Set themeRayon
     *
     * @param \BibliothequeBundle\Entity\Theme $themeRayon
     *
     * @return Rayon
     */
    public function setThemeRayon(\BibliothequeBundle\Entity\Theme $themeRayon = null)
    {
        $this->theme_rayon = $themeRayon;
    
        return $this;
    }

    /**
     * Get themeRayon
     *
     * @return \BibliothequeBundle\Entity\Theme
     */
    public function getThemeRayon()
    {
        return $this->theme_rayon;
    }

    public function __toString()
    {
        return '[D]'.$this->getDesignationRayon().' [T]'.$this->getThemeRayon();
    }
}
