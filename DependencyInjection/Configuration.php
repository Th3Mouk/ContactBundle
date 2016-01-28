<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
            ->arrayNode('datas')
                ->isRequired()
                ->children()
                    ->scalarNode('from')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end()
                    ->arrayNode('to')
                        ->isRequired()
                        ->cannotBeEmpty()
                        ->prototype('scalar')->end()
                    ->end()
                    ->scalarNode('subject')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end()
                ->end()
            ->end()
        ->end()

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
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('success')
                    ->defaultValue('contact.mail.success')
                    ->end()
                    ->scalarNode('error')
                    ->defaultValue('contact.mail.error')
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
