<?php

// src/Acme/StoreBundle/Document/Product.php
namespace Acme\StoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Acme\StoreBundle\Document\Loc as Loc;

/**
 * @MongoDB\Document
 * @MongoDB\Index(keys={"loc"="2dsphere"})
 */
class Product
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\Float
     */
    protected $price;

    /**
     * @MongoDB\EmbedOne(targetDocument="Loc")
     */
    protected $loc;
    



    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set loc
     *
     * @param Acme\StoreBundle\Document\Loc $loc
     * @return self
     */
    public function setLoc(\Acme\StoreBundle\Document\Loc $loc)
    {
        $this->loc = $loc;
        return $this;
    }

    /**
     * Get loc
     *
     * @return Acme\StoreBundle\Document\Loc $loc
     */
    public function getLoc()
    {
        return $this->loc;
    }
}
