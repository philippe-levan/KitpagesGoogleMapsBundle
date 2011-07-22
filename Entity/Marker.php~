<?php
namespace Kitpages\GoogleMapsBundle\Entity;

use Kitpages\GoogleMapsBundle\Entity\LatLng;

class Marker
{
    public function __construct(LatLng $position, $title="marker")
    {
        $this->position = $position;
        $this->title = $title;
    }

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var array $data
     */
    private $data = array();

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Kitpages\GoogleMapsBundle\Entity\LatLng
     */
    private $position;

    /**
     * @var Kitpages\GoogleMapsBundle\Entity\Map
     */
    private $map;


    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function setParameter($key, $val)
    {
        $this->data[$key] = $val;
    }
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set position
     *
     * @param Kitpages\GoogleMapsBundle\Entity\LatLng $position
     */
    public function setPosition(\Kitpages\GoogleMapsBundle\Entity\LatLng $position)
    {
        $this->position = $position;
    }

    /**
     * Get position
     *
     * @return Kitpages\GoogleMapsBundle\Entity\LatLng 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set map
     *
     * @param Kitpages\GoogleMapsBundle\Entity\Map $map
     */
    public function setMap(\Kitpages\GoogleMapsBundle\Entity\Map $map)
    {
        $this->map = $map;
    }

    /**
     * Get map
     *
     * @return Kitpages\GoogleMapsBundle\Entity\Map 
     */
    public function getMap()
    {
        return $this->map;
    }
    
    public function toArray()
    {
        return array(
            "position" => $this->getPosition()->toArray(),
            "title" => $this->getTitle(),
            "data" => $this->getData()
        );
    }
}