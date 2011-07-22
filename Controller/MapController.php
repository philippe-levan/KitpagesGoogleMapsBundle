<?php

namespace Kitpages\GoogleMapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Kitpages\GoogleMapsBundle\Entity\Map;

class MapController extends Controller
{
    
    public function widgetAction(Map $map, $mapName='no-name')
    {
        $mapLayout = $this->container->getParameter('kitpages_google_maps.layout');
        return $this->render('KitpagesGoogleMapsBundle:Map:widget.html.twig',
            array(
                'mapLayout' => $mapLayout,
                'map' => $map,
                'mapName' => $mapName
            )
        );
    }
}
