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

    /**
     * @return LatLngBound
     */
    public function getLatLngBoundsLimit() {
        // init bounds
        $bounds = new LatLngBound(new LatLng(), new LatLng());
        $center = $this->getCenter();

        // calculate left and right
        $halfWidth = (int)($this->getWidth() / 2) + 1;
        $delta = ( $halfWidth * 2^(21 - $this->getZoom()) ) ;
        $bounds->getSw()->setLng($this->adjustLngByPixels($center->getLng(), -$delta, $this->getZoom()));
        $bounds->getNe()->setLng($this->adjustLngByPixels($center->getLng(), $delta, $this->getZoom()));

        // calculate top and bottom
        $halfHeight = (int)($this->getHeight() / 2) + 1;
        $delta = $halfHeight * 2^(21 - $this->getZoom());
        $bounds->getNe()->setLat($this->adjustLatByPixels($center->getLat(), -$delta, $this->getZoom()));
        $bounds->getSw()->setLat($this->adjustLatByPixels($center->getLat(), $delta, $this->getZoom()));

        return $bounds;
    }

    /**
     * @param float   $lng
     * @param float   $delta
     * @param integer $zoom
     * @return float
     */
    protected function adjustLngByPixels($lng, $delta, $zoom)
    {
        return $this->xToLng($this->lngToX($lng) + ($delta << (21 - $zoom)));
    }

    /**
     * @param float   $lat
     * @param float   $delta
     * @param integer $zoom
     * @return float
     */
    protected function adjustLatByPixels($lat, $delta, $zoom)
    {
        return $this->yToLat($this->latToY($lat) + ($delta << (21 - $zoom)));
    }

    /**
     * @param float $lng
     * @return float
     */
    protected function lngToX($lng)
    {
        $offset = 268435456;
        $radius = $offset / pi();

        return round($offset + $radius * $lng * pi() / 180);
    }

    /**
     * @param float $lat
     * @return float
     */
    protected function latToY($lat)
    {
        $offset = 268435456;
        $radius = $offset / pi();

        return round($offset - $radius * log((1 + sin($lat * pi() / 180)) / (1 - sin($lat * pi() / 180))) / 2);
    }

    /**
     * @param float $x
     * @return float
     */
    protected function xToLng($x)
    {
        $offset = 268435456;
        $radius = $offset / pi();

        return ((round($x) - $offset) / $radius) * 180/ pi();
    }

    /**
     * @param float $y
     * @return float
     */
    protected function yToLat($y)
    {
        $offset = 268435456;
        $radius = $offset / pi();

        return (pi() / 2 - 2 * atan(exp((round($y) - $offset) / $radius))) * 180 / pi();
    }
}