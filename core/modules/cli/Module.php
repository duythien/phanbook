<?php
/**
 * Phanbook : Delightfully simple forum and Q&A software
 *
 * Licensed under The GNU License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link    http://phanbook.com Phanbook Project
 * @since   1.0.0
 * @author  Phanbook <hello@phanbook.com>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */
namespace Phanbook\Cli;

use Phalcon\Loader;
use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;

/**
 * \Phanbook\Cli\Module
 *
 * @package Phanbook\Cli
 */
class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module.
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $namespaces = [
            'Phanbook\Cli\Tasks'   => __DIR__ . '/tasks/',
            'Phanbook\Cli\Library' => __DIR__ . '/library/',
            'Phanbook\Seeder'      => __DIR__ . '/seeders/',
        ];

        $loader->registerNamespaces($namespaces);

        $loader->register();
    }

    /**
     * Registers services related to the module.
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        // Setting up the MVC Dispatcher
        $di->getShared('dispatcher')->setDefaultNamespace('Phanbook\Cli\Tasks');
    }
}
