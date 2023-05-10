<?php

declare(strict_types=1);

namespace OswisOrg\ServerCoreBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class OswisOrgServerCoreExtension extends Extension implements PrependExtensionInterface
{
    /**
     * Loads a specific configuration for this bundle.
     *
     * @param array<mixed> $configs
     *
     * @throws \Exception
     */
    final public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');
        $configuration = $this->getConfiguration($configs, $container);
        if ($configuration) {
            $this->oswisCoreSettingsProvider($container, $this->processConfiguration($configuration, $configs));
        }
    }

    final public function prepend(ContainerBuilder $container): void
    {
        // Add config for other bundles here...
    }

    /**
     * @param array<array<string|int|float>|string|int|float> $config
     */
    private function oswisCoreSettingsProvider(ContainerBuilder $container, array $config): void
    {
        $definition = $container->getDefinition('oswis_org_oswis_core.oswis_core_settings_provider');
        $definition->setArgument(0, $config['app']);
        $definition->setArgument(1, $config['admin']);
        $definition->setArgument(2, $config['email']);
        $definition->setArgument(3, $config['web']);
        $definition->setArgument(4, $config['admin_ips']);
        $definition->setArgument(5, $config['angular_admin']);
    }
}
