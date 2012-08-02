<?php
/**
 * Copyright Zikula Foundation 2012 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license MIT
 * @package ZikulaExamples_ExampleModule
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * This is the User controller class providing navigation and interaction functionality.
 */
class ExampleModule_Api_Admin extends Zikula_AbstractApi
{
    /**
     * get available admin panel links
     *
     * @return array array of admin links
     */
    public function getlinks()
    {
        $links = array();
        if (SecurityUtil::checkPermission('ExampleModule::', '::', ACCESS_ADMIN)) {
            $links[] = array(
                'url'   => ModUtil::url('ExampleModule', 'admin', 'main'),
                'text'  => $this->__('Hello World 1'),
                'title' => $this->__('Hello World 1'),
                'class' => 'z-icon-es-help',
            );
            $links[] = array(
                'url'   => ModUtil::url('ExampleModule', 'admin', 'main2'),
                'text'  => $this->__('Hello World 2'),
                'title' => $this->__('Hello World 2'),
                'class' => 'z-icon-es-config',
            );
        }
        return $links;
    }
}