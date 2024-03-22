<?php

namespace Lle\BiBundle\DependencyInjection;

use Lle\BiBundle\Contracts\DatasourceInterface;
use Lle\BiBundle\Contracts\ReportPartBuilderInterface;
use Lle\DashboardBundle\Contracts\ChartProviderInterface;
use Lle\DashboardBundle\Contracts\WidgetTypeInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class LleBiExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $container->registerForAutoconfiguration(ReportPartBuilderInterface::class)
            ->addTag('lle_bi.report_part');
        $container->registerForAutoconfiguration(DatasourceInterface::class)
            ->addTag('lle_bi.datasource');
    }
}
