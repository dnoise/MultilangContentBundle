<?php

namespace Symfony\Cmf\Bundle\MultilangContentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder,
    Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition,
    Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This class contains the configuration information for the bundle
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 *
 * @author Lukas Kahwe Smith <smith@pooteeweet.org>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('symfony_cmf_multilang_content');

        $rootNode
            ->children()
                ->scalarNode('document_manager_name')->defaultValue('default')->end()
                ->scalarNode('default_lang')->defaultValue('en')->end()
                ->arrayNode('lang_preference')
                    ->useAttributeAsKey('name')
                    ->defaultValue(array('en' => array('en', 'de'), 'de' => array('de', 'en')))
                    ->prototype('scalar')->end()
                ->end()
                ->arrayNode('lang_meta')
                    ->useAttributeAsKey('name')
                    ->defaultValue(array(
                        'de' => array('fullname' => 'Deutsch', 'completion' => 'utsch'),
                        'fr' => array('fullname' => 'Français', 'completion' => 'ançais'),
                        'en' => array('fullname' => 'English', 'completion' => 'glish'),
                        'it' => array('fullname' => 'Italiano', 'completion' => 'aliano'),
                    ))
                    ->prototype('scalar')->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
