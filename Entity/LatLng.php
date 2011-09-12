<?php

namespace Kitpages\GoogleMapsBundle\Entity;


class LatLng
{
    /**
     * @var float $lat
     */
    private $lat;

    /**
     * @var float $lng
     */
    private $lng;

    /**
     * @var integer $id
     */
    private $id;


    /**
     * Constructor
     *
     * @param float $lat
     * @param float $lng
     */
    public function __construct($lat = null, $lng = null)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * Set lat
     *
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * Get lat
     *
     * @return float 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param float $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    /**
     * Get lng
     *
     * @return float 
     */
    public function getLng()
    {
        return $this->lng;
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
     * Serializes the coordinates to an array
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            "lat" => $this->lat,
            "lng" => $this->lng
        );
    }
}