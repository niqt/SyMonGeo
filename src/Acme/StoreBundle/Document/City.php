<?php
namespace Acme\StoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Acme\StoreBundle\Document\Coordinates as Coordinates;


/**
* @MongoDB\Document
* @MongoDB\Index(keys={"coordinates"="2d"})
*/

class City
{
    /**
     * @MongoDB\Id
     */
    
    public $id;
    /**
     * @MongoDB\String
     */
    public $name;
    
    /** @MongoDB\EmbedOne(targetDocument="Coordinates") */
    public $coordinates;
    
    /** @MongoDB\Distance */
    public $test;

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
     * Set coordinates
     *
     * @param Acme\StoreBundle\Document\Coordinates $coordinates
     * @return self
     */
    public function setCoordinates(\Acme\StoreBundle\Document\Coordinates $coordinates)
    {
        $this->coordinates = $coordinates;
        return $this;
    }

    /**
     * Get coordinates
     *
     * @return Acme\StoreBundle\Document\Coordinates $coordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Set test
     *
     * @param string $test
     * @return self
     */
    public function setTest($test)
    {
        $this->test = $test;
        return $this;
    }

    /**
     * Get test
     *
     * @return string $test
     */
    public function getTest()
    {
        return $this->test;
    }
}
