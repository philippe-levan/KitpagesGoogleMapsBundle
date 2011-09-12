<?php

namespace Kitpages\GoogleMapsBundle\Entity;


class Map
{
    /**
     * @var integer $width
     */
    private $width;

    /**
     * @var integer $height
     */
    private $height;

    /**
     * @var array $data
     */
    private $data;

    /**
     * @var integer $zoom
     */
    private $zoom;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var LatLng
     */
    private $center;

    /**
     * @var Marker
     */
    private $markerList;

    /**
     * @var string $layer
     */
    private $layer;
    

    public function __construct($width = 600, $height= 400, LatLng $center = null, $zoom = null)
    {
        $this->markerList = new \Doctrine\Common\Collections\ArrayCollection();
        $this->width = $width;
        $this->height = $height;
        $this->center = $center;
        $this->zoom = $zoom;
    }
    
    /**
     * Set width
     *
     * @param integer $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Get width
     *
     * @return integer 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set parameter $key with $val
     *
     * @param string $key
     * @param mixed $val
     * @return void
     */
    public function setParameter($key, $val)
    {
        $this->data[$key] = $val;
    }


    /**
     * Get parameter with key $key
     *
     * @param string $key
     * @return mixed
     */
    public function getParameter($key)
    {
        if (! array_key_exists($key, $this->data) ) {
            return null;
        }
        
        return $this->data[$key];
    }

    /**
     * Set data
     *
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Get data
     *
     * @return array 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set zoom
     *
     * @param integer $zoom
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    }

    /**
     * Get zoom
     *
     * @return integer 
     */
    public function getZoom()
    {
        return $this->zoom;
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
     * Set center
     *
     * @param LatLng $center
     */
    public function setCenter(LatLng $center)
    {
        $this->center = $center;
    }

    /**
     * Get center
     *
     * @return LatLng
     */
    public function getCenter()
    {
        return $this->center;
    }

    /**
     * Add markerList
     *
     * @param Marker $markerList
     */
    public function addMarker(Marker $markerList)
    {
        $this->markerList[] = $markerList;
    }

    /**
     * Get markerList
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarkerList()
    {
        return $this->markerList;
    }

    /**
     * Serializes the map to an array
     *
     * @return array
     */
    public function toArray()
    {
        $encodedMarkerList = array();
        foreach ($this->getMarkerList() as $marker) {
            $encodedMarkerList[] = $marker->toArray();
        }

        $center = null;
        if ($this->getCenter() instanceof LatLng) {
            $center = $this->getCenter()->toArray();
        }

        $tab = array(
            "width" => $this->getWidth(),
            "height" => $this->getHeight(),
            "center" => $center,
            "id" => $this->getId(),
            "zoom" => $this->getZoom(),
            "data" => $this->getData(),
            "layer" => $this->getLayer(),
            "markerList" => $encodedMarkerList
        );
        
        return $tab;
    }

    /**
     * Set layer
     *
     * @param string $layer
     */
    public function setLayer($layer)
    {
        $this->layer = $layer;
    }

    /**
     * Get layer
     *
     * @return string 
     */
    public function getLayer()
    {
        return $this->layer;
    }
}