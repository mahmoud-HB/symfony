<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\PanierRepository")
 */
class Panier
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
    * @ORM\OneToOne(targetEntity="BackBundle\Entity\Produits", cascade={"persist"})
    */
    private $produit;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="BackBundle\Entity\Commandes", cascade={"persist"}, inversedBy="panier")
     *
     */
    private $commande;

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
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Panier
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set produit
     *
     * @param \BackBundle\Entity\Produits $produit
     *
     * @return Panier
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

    /**
     * Set commande
     *
     * @param \BackBundle\Entity\Commandes $commande
     *
     * @return Panier
     */
    public function setCommande(\BackBundle\Entity\Commandes $commande = null)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \BackBundle\Entity\Commandes
     */
    public function getCommande()
    {
        return $this->commande;
    }
}
