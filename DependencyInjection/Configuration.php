<?php

namespace Kitpages\GoogleMapsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;


/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('kitpages_google_maps');

        $this->addBaseSection($rootNode);

        return $treeBuilder;
    }
    
    /**
     * Parses the kitpages_google_maps config section
     * Example for yaml driver:
     * kitpages_google_maps:
     *     layout: 'KitpagesGoogleMapsBundle:Map:layout.html.twig'
     *
     * @param ArrayNodeDefinition $node
     * @return void
     */
    private function addBaseSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->scalarNode('layout')
                    ->defaultValue('KitpagesGoogleMapsBundle:Map:layout.html.twig')
                ->end()
            ->end();
    }

}
