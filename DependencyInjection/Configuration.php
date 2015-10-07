<?php

namespace Th3Mouk\ContactBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('th3mouk_contact');

        $rootNode
        ->children()
            ->arrayNode('class')
                ->isRequired()
                ->children()
                    ->scalarNode('entity')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end()
                    ->scalarNode('formType')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end()
                ->end()
            ->end()
        ->end()

        ->children()
            ->arrayNode('templates')
                ->isRequired()
                ->cannotBeEmpty()
                ->children()
                    ->scalarNode('application')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end()
                    ->scalarNode('mailer')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end()
                ->end()
            ->end()
        ->end()

        ->children()
            ->arrayNode('flash_messages')
                ->children()
                    ->scalarNode('success')
                    ->end()
                    ->scalarNode('error')
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
