<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Traductions
 *
 * @ORM\Table(name="traductions")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\TraductionsRepository")
 */
class Traductions
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
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=255)
     */
    private $langue;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

     /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="BackBundle\Entity\Categories", cascade={"persist"}, inversedBy="traduction")
     */
    private $categorie;

     /**
     * @var int
     *
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Types", cascade={"persist"},)
     */
    private $type;

    /**
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="BackBundle\Entity\Produits", cascade={"persist"}, inversedBy="traduction")
     *
     */
    private $produit;
   
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->type = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set langue
     *
     * @param string $langue
     *
     * @return Traductions
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Traductions
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
     * Set description
     *
     * @param string $description
     *
     * @return Traductions
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set categorie
     *
     * @param \BackBundle\Entity\Categories $categorie
     *
     * @return Traductions
     */
    public function setCategorie(\BackBundle\Entity\Categories $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \BackBundle\Entity\Categories
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add type
     *
     * @param \BackBundle\Entity\Types $type
     *
     * @return Traductions
     */
    public function addType(\BackBundle\Entity\Types $type)
    {
        $this->type[] = $type;

        return $this;
    }

    /**
     * Remove type
     *
     * @param \BackBundle\Entity\Types $type
     */
    public function removeType(\BackBundle\Entity\Types $type)
    {
        $this->type->removeElement($type);
    }

    /**
     * Get type
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set produit
     *
     * @param \BackBundle\Entity\Produits $produit
     *
     * @return Traductions
     */
    public function setProduit(\BackBundle\Entity\Produits $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \BackBundle\Entity\Produits
     */
    public function getProduit()
    {
        return $this->produit;
    }
}
