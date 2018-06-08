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
        $namespaces = $this->_getNamespace(true);
        foreach ($namespaces as $namespace) {
	        if ($namespace == 'default') {
				continue;
			}
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
        $namespaces = $this->_getNamespace(true);
        foreach ($namespaces as $namespace) {
			if ($namespace == 'default') {
				continue;
			}
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
        $namespace = $this->_getNamespace();
		$migration = $this->_getMigrationClass($namespace);
		$migration->diff();
    }

    /**
     * Execute migrations down
     *
     * @return void
     */
    public function downAction()
    {
        $namespace = $this->_getNamespace();
        $migration = $this->_getMigrationClass($namespace);
        $migration->down();
    }

    /**
     * Execute all pending migrations
     *
     * @return void
     */
    public function migrateAction()
    {
        $namespaces = $this->_getNamespace(true);
        foreach ($namespaces as $namespace) {
			if ($namespace == 'default') {
				continue;
			}
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
        $namespace = $this->_getNamespace();
        $migration = $this->_getMigrationClass($namespace);
        $migration->status();
    }

    /**
     * Execute migrations up
     *
     * @return void
     */
    public function upAction()
    {
        $namespace = $this->_getNamespace();
        $migration = $this->_getMigrationClass($namespace);
        $migration->up();
    }

    /**
     * Execute all updates for module(s)
     *
     * @return void
     */
    public function updateAction()
    {
        $namespaces = $this->_getNamespace(true);
        foreach ($namespaces as $namespace) {
			if ($namespace == 'default') {
				continue;
            }
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
    protected function _getNamespace($allowMultiple = false)
    {
        $return = [];
        $request = $this->getRequest();
        $namespace = $request->getParam('namespace');
        if (($allowMultiple)&&($namespace == 'all')) {
            $config = $this->getConfig();
            $connections = @$config ['propel'] ['database'] ['connections'];
            return array_keys($connections);
        }
        if (preg_match('/,/', $namespace)) {
            $return = explode(',', $namespace);
        } else {
            $return = [ $namespace ];
        }
        if (!$allowMultiple) {
            return array_shift($allowMultiple);
        }
        return $return;
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


