<?php
/**
 * Eliasis PHP Framework
 *
 * @author     Josantonius - hola@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Eliasis-Framework/Eliasis
 * @since      1.0.0
 */

namespace Eliasis\Module;

use Eliasis\App\App,
	Eliasis\Module\Exception\ModuleException;

/**
 * Module class.
 *
 * @since 1.0.0
 */
class Module { 

    /**
     * Module instance.
     *
     * @since 1.0.0
     *
     * @var object
     */
    protected static $instance;

    /**
     * Available modules.
     *
     * @since 1.0.0
     *
     * @var array
     */
    protected $modules = [];

    /**
     * Name of current module called.
     *
     * @since 1.0.0
     *
     * @var array
     */
    public static $moduleName;

    /**
     * Get module instance.
     *
     * @since 1.0.0
     *
     * @return object → module instance
     */
    public static function getInstance() {

        if (is_null(self::$instance)) { 

            self::$instance = new self();
        }

        return self::$instance;
    }
                                                                               
    /**
     * Add module.
     *
     * @since 1.0.0
     *
     * @param string $module → module info
     * @param string $path   → module path
     *
     * @throws ModuleException → module configuration file error
     * @throws ModuleException → no routes or hooks were found
     */
    public static function add($module, $path) {

		$instance = self::getInstance();

		$required = [

			'name',
			'version',
			'description',
			'uri',
			'author',
			'author-uri',
			'license',
		];

		if (count(array_intersect_key(array_flip($required),$module)) !== 7) {

			$message = 'The module configuration file is not correct. Path';

			throw new ModuleException($message . ': ' . $path . '.', 816);
		}

		self::$moduleName = $module['name'];

		$folder = explode('/', $path);

		$instance->modules[self::$moduleName] = [

			'path'   => $path,
			'folder' => array_pop($folder),
		];

		$routes = $instance->_addResource('Routes');

		$hooks  = $instance->_addResource('Hooks');

		if (!$routes && $hooks) {

			$message = 'No routes or hooks were found for the module';

			throw new ModuleException($message.' '.self::$moduleName.'.',817);
		}
    }
                                                                               
    /**
     * Add module routes and hooks.
     *
     * @since 1.0.0
     *
     * @param string $class     → name of the class (Routes | Hooks)
     *
     * @return boolean
     */
    private function _addResource($class) {

    	$namespace = $this->getNamespace();

    	if (method_exists($namespace . $class, 'add')) {

			call_user_func([$namespace . $class, 'add']);

			return true;
    	}

		return false;
    }

    /**
     * Get module namespace.
     *
     * @since 1.0.0
     *
     * @param string $type → namespace location
	 *
	 * @return string → namespace
     */
    protected function getNamespace($type = '') {

    	$namespace = App::namespace('modules') . self::$moduleName . BS;

    	switch ($type) {

    		case 'controller':
    			return $namespace . 'Controller' . BS;

    		case 'model':
    			return $namespace . 'Model' . BS;

    		default:
    			return $namespace;
    	}
    }

    /**
     * Get module urls.
     *
     * @since 1.0.0
     *
     * @param string $directory → module directory url
	 *
	 * @return string → full url
     */
    protected function getUrl($directory = '') {

    	$url = MODULES_URL . $this->getFolder() . DS;

    	switch ($directory) {

    		case 'assets':
    			return $url . 'assets' . DS;

    		case 'css':
    			return $url . 'assets' . DS . 'css' . DS;

    		case 'js':
    			return $url . 'assets' . DS .  'js' . DS;

    		default:
    			return $url;
    	}
    }

    /**
     * Get module paths.
     *
     * @since 1.0.0
	 *
	 * @return string → path
     */
    protected function getPath($directory = '') {

    	$path = $this->modules[self::$moduleName]['path'] . DS;

    	switch ($directory) {

    		case 'template':
    			return $path . 'src' . DS . 'template' . DS;

            case 'view':
                return $path . 'src' . DS . 'template' . DS . 'view' . DS;

    		default:
    			return $path;
    	}
    }

    /**
     * Get module folder name.
     *
     * @since 1.0.0
	 *
	 * @return string → folder name
     */
    protected function getFolder() {

    	return $this->modules[self::$moduleName]['folder'];
    }

    /**
     * Receives the name of the module to execute: Module::ModuleName();
     *
     * @param string $index  → module name
     * @param array  $params → params
     *
     * @throws ModuleException → Module not found
     * @throws ModuleException → Method not found
     *
     * @return mixed
     */
    public static function __callstatic($index, $params = '') {

    	$instance = self::getInstance();

    	if (!isset($instance->modules[$index])) {

			$message = 'Module not found';
			throw new ModuleException($message . ': ' . $index . '.', 818);
    	}

    	self::$moduleName = $index;

    	$method = $params[0];

    	$params = $params[1];

    	if (method_exists($instance, $method)) {

    		return call_user_func([$instance, $method], $params);
    	}

		$message = 'Method not found';
		throw new ModuleException($message .': '. $method . '.', 996);
    }
}
