<?php
namespace Kitpages\GoogleMapsBundle\Entity;

use Kitpages\GoogleMapsBundle\Entity\LatLng;

class LatLngBound
{
    public function __construct(LatLng $sw, LatLng $ne)
    {
        $this->sw = $sw;
        $this->ne = $ne;
    }

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Kitpages\GoogleMapsBundle\Entity\LatLng
     */
    private $sw;

    /**
     * @var Kitpages\GoogleMapsBundle\Entity\LatLng
     */
    private $ne;


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
     * Set sw
     *
     * @param Kitpages\GoogleMapsBundle\Entity\LatLng $sw
     */
    public function setSw(\Kitpages\GoogleMapsBundle\Entity\LatLng $sw)
    {
        $this->sw = $sw;
    }

    /**
     * Get sw
     *
     * @return Kitpages\GoogleMapsBundle\Entity\LatLng 
     */
    public function getSw()
    {
        return $this->sw;
    }

    /**
     * Set ne
     *
     * @param Kitpages\GoogleMapsBundle\Entity\LatLng $ne
     */
    public function setNe(\Kitpages\GoogleMapsBundle\Entity\LatLng $ne)
    {
        $this->ne = $ne;
    }

    /**
     * Get ne
     *
     * @return Kitpages\GoogleMapsBundle\Entity\LatLng 
     */
    public function getNe()
    {
        return $this->ne;
    }
}