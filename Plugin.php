<?php
/*
 * Copyright 2014 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * @file The main file of Zakala:OperatorStatus plugin.
 *
 */

namespace OperatorStatus\Mibew\Plugin\OperatorStatus;

use Mibew\EventDispatcher\EventDispatcher;
use Mibew\EventDispatcher\Events;

class Plugin extends \Mibew\Plugin\AbstractPlugin implements \Mibew\Plugin\PluginInterface
{
    /**
     * {@link \Mibew\Plugin\PluginInterface::initialized()} method.
     */
    protected $initialized = true;

    /**
     * @param array $config Associative array of configuration params from the
     * main config file.
     */
    public function __construct($config)
    {
        if (!isset($config['very_important_value'])) {
            $this->initialized = false;
        }
    }

    /**
     * The main entry point of a plugin
     * Here we can attach event listeners and do other job.
     */
    public function run()
    {
        $dispatcher = EventDispatcher::getInstance();
        $dispatcher->attachListener(Events::PAGE_ADD_CSS, $this, 'addCustomCss');
    }

    /**
     * @param array $args Associative array of arguments passed in to event
     * handler. The list of arguments can vary for different events. See an
     * event description to know which arguments are available and how they
     * should be used.
     */
    public function addCustomCss(&$args)
    {
        //$args['css'][] = $this->getFilesPath() . '/css/styles.css';
    }

    /**
     * Returns verision of the plugin.
     *
     * @return string Plugin's version.
     */
    public static function getVersion()
    {
        return '0.1.0';
    }

    /**
     * current plugin in config.php
     *
     * If the plugin depends, for example, on "Abc:BestFeature" and "Xyz:Logger"
     * we need to return the following array:
     * <code>
     * return array(
     *     'Abc:BestFeature' => '0.2.1',
     *     'Xyz:Logger' => '3.1.4',
     * );
     * </code>
     */
    public static function getDependencies()
    {
        // This plugin does not depend on others so return an empty array.
        return array();
    }
}
