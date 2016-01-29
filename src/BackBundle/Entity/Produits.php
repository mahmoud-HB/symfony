<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="produits")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\ProduitsRepository")
 */
class Produits
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Traductions", cascade={"persist"}, mappedBy="produit")
     */
    private $traduction;

    /**
     * @var bool
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=0)
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     * @var DateTime
     * 
     * @ORM\Column(name="datecreation", type="datetime")
     */
    private $datecreation;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="dateupdate", type="datetime")
     */
    private $dateupdate;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->traduction = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set actif
     *
     * @param boolean $actif
     *
     * @return Produits
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Produits
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Produits
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     *
     * @return Produits
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * Set dateupdate
     *
     * @param \DateTime $dateupdate
     *
     * @return Produits
     */
    public function setDateupdate($dateupdate)
    {
        $this->dateupdate = $dateupdate;

        return $this;
    }

    /**
     * Get dateupdate
     *
     * @return \DateTime
     */
    public function getDateupdate()
    {
        return $this->dateupdate;
    }

    /**
     * Add traduction
     *
     * @param \BackBundle\Entity\Traductions $traduction
     *
     * @return Produits
     */
    public function addTraduction(\BackBundle\Entity\Traductions $traduction)
    {
        $this->traduction[] = $traduction;

        return $this;
    }

    /**
     * Remove traduction
     *
     * @param \BackBundle\Entity\Traductions $traduction
     */
    public function removeTraduction(\BackBundle\Entity\Traductions $traduction)
    {
        $this->traduction->removeElement($traduction);
    }

    /**
     * Get traduction
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTraduction()
    {
        return $this->traduction;
    }
}
