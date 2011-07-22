<?php

namespace Kitpages\GoogleMapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Kitpages\GoogleMapsBundle\Entity\Map;
use Kitpages\GoogleMapsBundle\Entity\LatLng;
use Kitpages\GoogleMapsBundle\Entity\Marker;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $map = new Map(
            600,
            400,
            new LatLng(-34.397, 150.644),
            8
        );
        $map->setParameter("updateMarkerUrl", $this->generateUrl('kitpages_google_maps_ajax_markers'));
        
        $marker = new Marker( new LatLng(-34.397, 150.644) );
        $marker->setParameter("pictoValue", 12);
        $map->addMarker( $marker );
        
        $map->addMarker( new Marker( new LatLng(-34.397, 150.744) ) );
        return $this->render('KitpagesGoogleMapsBundle:Default:index.html.twig',
            array('map' => $map)
        );
    }
    
    public function ajaxMarkerListAction()
    {
        $map = new Map();
        $marker = new Marker( new LatLng(-34.297, 150.344) );
        $marker->setParameter("value", 12);
        $map->addMarker( $marker );
        $map->addMarker( new Marker( new LatLng(-34.197, 150.444) ) );
        $response = array(
            "map" => $map->toArray()
        );
        return new Response(json_encode( $response ));
    }
}
