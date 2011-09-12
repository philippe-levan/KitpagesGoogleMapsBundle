<?php

namespace Kitpages\GoogleMapsBundle\Entity;


class Marker
{
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
     * @var LatLng
     */
    private $position;

    /**
     * @var Map
     */
    private $map;

    
    /**
     * Constructor
     *
     * @param LatLng $position
     * @param string $title
     */
    public function __construct(LatLng $position, $title = 'marker')
    {
        $this->position = $position;
        $this->title = $title;
    }

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
     * @param LatLng $position
     */
    public function setPosition(LatLng $position)
    {
        $this->position = $position;
    }

    /**
     * Get position
     *
     * @return LatLng
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set map
     *
     * @param Map $map
     */
    public function setMap(Map $map)
    {
        $this->map = $map;
    }

    /**
     * Get map
     *
     * @return Map
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Serializes Marker to an array
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            "position" => $this->getPosition()->toArray(),
            "title" => $this->getTitle(),
            "data" => $this->getData()
        );
    }
}