<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\ContactBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class Th3MoukContactExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('th3mouk.contact.datas', $config['datas']);

        $container->setParameter('th3mouk.contact.class.entity', $config['class']['entity']);
        $container->setParameter('th3mouk.contact.class.form', $config['class']['formType']);

        $container->setParameter('th3mouk.contact.template.application', $config['templates']['application']);
        $container->setParameter('th3mouk.contact.template.mailer', $config['templates']['mailer']);

        if (isset($config['flash_messages'])) {
            if ($config['flash_messages']['success']) {
                $container->setParameter('th3mouk.contact.flash.success', $config['flash_messages']['success']);
            }
            if ($config['flash_messages']['error']) {
                $container->setParameter('th3mouk.contact.flash.error', $config['flash_messages']['error']);
            }
        }

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'th3mouk_contact';
    }
}
