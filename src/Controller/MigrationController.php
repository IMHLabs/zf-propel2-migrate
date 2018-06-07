<?php
/**
 * Propel2 Migrate
 *
 * @uses Zend\Mvc\Controller\AbstractActionController
 */
namespace DataSourcePropel\Migrate\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 *
 * @package DataSourcePropel\Migrate
 * @subpackage Controller
 */
class MigrationController extends AbstractActionController
{

    protected $_config = [];

    /**
     * Set Module configuration
     *
     * @param array $config
     * @return \DataSourcePropel\Migrate\Controller\MigrationController
     */
    public function setConfig($config = [])
    {
        $this->_config = $config;
        return $this;
    }

    /**
     * Get Module configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * Build the model classes based on Propel XML schemas
     *
     * @return void
     */
    public function buildAction()
    {
        $namespaces = $this->_getNamespace();
        foreach ($namespaces as $namespace) {
            
            $migration = $this->_getMigrationClass($namespace);
            $migration->build();
        }
    }

    /**
     * Build SQL files
     *
     * @return void
     */
    public function buildSqlAction()
    {
        $namespaces = $this->_getNamespace();
        foreach ($namespaces as $namespace) {
            $migration = $this->_getMigrationClass($namespace);
            $migration->buildSql();
        }
    }

    /**
     * Generate diff classes
     *
     * @return void
     */
    public function diffAction()
    {
        $namespaces = $this->_getNamespace();
        foreach ($namespaces as $namespace) {
            $migration = $this->_getMigrationClass($namespace);
            $migration->diff($this->_getEnv());
        }
    }

    /**
     * Execute migrations down
     *
     * @return void
     */
    public function downAction()
    {
        $namespaces = $this->_getNamespace();
        foreach ($namespaces as $namespace) {
            $migration = $this->_getMigrationClass($namespace);
            $migration->down();
        }
    }

    /**
     * Execute all pending migrations
     *
     * @return void
     */
    public function migrateAction()
    {
        $namespaces = $this->_getNamespace();
        foreach ($namespaces as $namespace) {
            $migration = $this->_getMigrationClass($namespace);
            $migration->migrate();
        }
    }

    /**
     * Display migration status
     *
     * @return void
     */
    public function statusAction()
    {
        $namespaces = $this->_getNamespace();
        foreach ($namespaces as $namespace) {
            $migration = $this->_getMigrationClass($namespace);
            $migration->status();
        }
    }

    /**
     * Execute migrations up
     *
     * @return void
     */
    public function upAction()
    {
        $namespaces = $this->_getNamespace();
        foreach ($namespaces as $namespace) {
            $migration = $this->_getMigrationClass($namespace);
            $migration->up();
        }
    }

    /**
     * Execute all updates for module(s)
     *
     * @return void
     */
    public function updateAction()
    {
        $namespaces = $this->_getNamespace();
        foreach ($namespaces as $namespace) {
            $migration = $this->_getMigrationClass($namespace);
            $migration->migrate();
            $migration->buildSql();
            $migration->build();
        }
    }

    /**
     * Get Module to update
     *
     * @return void
     */
    protected function _getNamespace()
    {
        $return = [];
        $request = $this->getRequest();
        $namespace = $request->getParam('namespace');
        if (preg_match('/,/', $namespace)) {
            $return = explode(',', $namespace);
        } else {
            $return = [
                $namespace
            ];
        }
        return $return;
    }

    /**
     * Get Module to update
     *
     * @return void
     */
    protected function _getEnv()
    {
        $request = $this->getRequest();
        return ($request->getParam('env')) ?: null;
    }

    /**
     * Get Migration Class
     *
     * @param string $namespace
     * @return string|null
     */
    protected function _getMigrationClass($namespace)
    {
        return \DataSourcePropel\Propel::migration($this->getConfig(), $namespace);
    }
}

