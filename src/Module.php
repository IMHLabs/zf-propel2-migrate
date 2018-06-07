<?php
/**
 * Propel2 Migrate
 *
 * @uses Zend\Console\Adapter\AdapterInterface
 * @uses Zend\EventManager\EventInterface
 * @uses Zend\ModuleManager\Feature\AutoloaderProviderInterface
 * @uses Zend\ModuleManager\Feature\BootstrapListenerInterface 
 * @uses Zend\ModuleManager\Feature\ConfigProviderInterface 
 * @uses Zend\ModuleManager\Feature\ConsoleUsageProviderInterface 
 * @uses Propel\Runtime\Propel
 * @uses Propel\Runtime\Connection\ConnectionManagerSingle
 */
namespace DataSourcePropel\Migrate;

use Zend\Console\Adapter\AdapterInterface;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface as Autoloader;
use Zend\ModuleManager\Feature\BootstrapListenerInterface as BootstrapListener;
use Zend\ModuleManager\Feature\ConfigProviderInterface as Config;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface as ConsoleUsage;

/**
 *
 * @package DataSourcePropel\Migrate
 */
class Module implements ConsoleUsage, Config, Autoloader, BootstrapListener
{

    /**
     * @inheritDoc
     */
    public function onBootstrap(EventInterface $e)
    {}

    /**
     * @inheritDoc
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * @inheritDoc
     */
    public function getControllerConfig()
    {
        return [
            'factories' => [
                'migrateController' => 'DataSourcePropel\Migrate\Factory\Controller\MigrationControllerFactory',
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src'
                ]
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function getConsoleUsage(AdapterInterface $console)
    {
        return [
            [
                'php index.php propel build [NAMESPACE|[comma delimited NAMESPACES]',
                'Build the model classes based on Propel XML schemas'
            ],
            [
                'php index.php propel build-sql [NAMESPACE|[comma delimited NAMESPACES]',
                'Build SQL files'
            ],
            [
                'php index.php propel diff [NAMESPACE|[comma delimited NAMESPACES]',
                'Generate diff classes'
            ],
            [
                'php index.php propel down [NAMESPACE|[comma delimited NAMESPACES]',
                'Execute migrations down'
            ],
            [
                'php index.php propel migrate [NAMESPACE|[comma delimited NAMESPACES]',
                'Execute all pending migrations'
            ],
            [
                'php index.php propel status [NAMESPACE|[comma delimited NAMESPACES]',
                'Get migration status'
            ],
            [
                'php index.php propel up [NAMESPACE|[comma delimited NAMESPACES]',
                'Execute migrations up'
            ],
            [
                'php index.php propel migration-diff [NAMESPACE|[comma delimited NAMESPACES]',
                'Generate diff classes'
            ],
            [
                'php index.php propel migration-down [NAMESPACE|[comma delimited NAMESPACES]',
                'Execute migrations down'
            ],
            [
                'php index.php propel migration-migrate [NAMESPACE|[comma delimited NAMESPACES]',
                'Execute all pending migrations'
            ],
            [
                'php index.php propel migration-status [NAMESPACE|[comma delimited NAMESPACES]',
                'Get migration status'
            ],
            [
                'php index.php propel migration-up [NAMESPACE|[comma delimited NAMESPACES]',
                'Execute migrations up'
            ],
            [
                'php index.php propel model-build [NAMESPACE|[comma delimited NAMESPACES]',
                'Build the model classes based on Propel XML schemas'
            ],
            [
                'php index.php propel sql-build [NAMESPACE|[comma delimited NAMESPACES]',
                'Build SQL files'
            ],
            [
                'php index.php propel update [NAMESPACE|[comma delimited NAMESPACES]',
                'Execute pending migrations, build SQL files, build Propel classes'
            ]
        ];
    }
}

