<?php

// src/Acme/StoreBundle/Document/Loc.php
namespace Acme\StoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\EmbeddedDocument
 *
 */
class Loc
{

    /**
     * @MongoDB\String
     */
    protected $type;
    
    /**
     * @MongoDB\Collection
     */
    
    protected $coordinates;


    /**
     * Set type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set coordinates
     *
     * @param collection $coordinates
     * @return self
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
        return $this;
    }

    /**
     * Get coordinates
     *
     * @return collection $coordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }
}
