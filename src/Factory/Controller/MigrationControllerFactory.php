<?php
/**
 * Propel2 Migrate
 *
 * @uses Zend\ServiceManager\FactoryInterface;
 * @uses Zend\ServiceManager\ServiceLocatorInterface;
 * @uses DataSourcePropel\Migrate\Controller\MigrationController;
 */
namespace DataSourcePropel\Migrate\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use DataSourcePropel\Migrate\Controller\MigrationController;

/**
 *
 * @package DataSourcePropel\Migrate
 * @subpackage Factory
 */
class MigrationControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('configuration');
        $controller = new MigrationController();
        $controller->setConfig($config);
        return $controller;
    }
}

