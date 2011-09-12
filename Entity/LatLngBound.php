<?php

namespace Kitpages\GoogleMapsBundle\Entity;


class LatLngBound
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var LatLng
     */
    private $sw;

    /**
     * @var LatLng
     */
    private $ne;


    /**
     * Constructor
     *
     * @param LatLng $sw
     * @param LatLng $ne
     */
    public function __construct(LatLng $sw, LatLng $ne)
    {
        $this->sw = $sw;
        $this->ne = $ne;
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
     * Set sw
     *
     * @param LatLng $sw
     */
    public function setSw(LatLng $sw)
    {
        $this->sw = $sw;
    }

    /**
     * Get sw
     *
     * @return LatLng
     */
    public function getSw()
    {
        return $this->sw;
    }

    /**
     * Set ne
     *
     * @param LatLng $ne
     */
    public function setNe(LatLng $ne)
    {
        $this->ne = $ne;
    }

    /**
     * Get ne
     *
     * @return LatLng
     */
    public function getNe()
    {
        return $this->ne;
    }
}