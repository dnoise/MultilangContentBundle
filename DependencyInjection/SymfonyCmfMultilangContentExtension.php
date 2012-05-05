<?php

namespace Symfony\Cmf\Bundle\MultilangContentBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

/**
 * Dependency injection class to load services.xml
 *
 * @author brian.king (at) liip.ch
 */
class SymfonyCmfMultilangContentExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $alias = $this->getAlias();
        foreach ($config as $key => $value) {
            $container->setParameter($alias . '.' . $key, $value);
        }

        $loader->load('services.xml');

        $languageSelectorController = $container->getDefinition('symfony_cmf_multilang_content.language_selector_controller');
        $languageSelectorController->replaceArgument(1, $config['document_manager_name']);
    }
}
