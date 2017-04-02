<?php

namespace DMH\ECommerceBundle\Entity;

use DMH\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Basket
 *
 * @ORM\Table(name="dmh_basket")
 * @ORM\Entity(repositoryClass="DMH\ECommerceBundle\Repository\BasketRepository")
 */
class Basket
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
     * @var User
     *
     * @ORM\OneToOne(targetEntity="DMH\UserBundle\Entity\User", cascade={})
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     * @Serializer\Groups({})
     */
    private $user;


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
     * Constructor
     */
    public function __construct()
    {
        $this->creations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \DMH\UserBundle\Entity\User $user
     *
     * @return Basket
     */
    public function setUser(\DMH\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \DMH\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add creation
     *
     * @param \DMH\ECommerceBundle\Entity\Creation $creation
     *
     * @return Basket
     */
    public function addCreation(\DMH\ECommerceBundle\Entity\Creation $creation)
    {
        $this->creations[] = $creation;

        return $this;
    }

    /**
     * Remove creation
     *
     * @param \DMH\ECommerceBundle\Entity\Creation $creation
     */
    public function removeCreation(\DMH\ECommerceBundle\Entity\Creation $creation)
    {
        $this->creations->removeElement($creation);
    }

    /**
     * Get creations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreations()
    {
        return $this->creations;
    }
}
