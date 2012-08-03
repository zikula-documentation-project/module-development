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
class ExampleModule_Api_User extends Zikula_AbstractApi
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
                'url'   => ModUtil::url('ExampleModule', 'user', 'example1'),
                'text'  => $this->__('Example 1'),
                'class' => 'z-icon-es-help',
            );
            $links[] = array(
                'url'   => ModUtil::url('ExampleModule', 'user', 'example2'),
                'text'  => $this->__('Example 2'),
                'class' => 'z-icon-es-help',
            );
            $links[] = array(
                'url'   => ModUtil::url('ExampleModule', 'user', 'example3'),
                'text'  => $this->__('Example 3'),
                'class' => 'z-icon-es-help',
            );
            $links[] = array(
                'url'   => ModUtil::url('ExampleModule', 'user', 'example4'),
                'text'  => $this->__('Example 4'),
                'class' => 'z-icon-es-help',
            );
            $links[] = array(
                'url'   => ModUtil::url('ExampleModule', 'user', 'example5'),
                'text'  => $this->__('Prototype Example'),
                'class' => 'z-icon-es-help',
            );
            $links[] = array(
                'url'   => ModUtil::url('ExampleModule', 'user', 'example6'),
                'text'  => $this->__('jQuery Example'),
                'class' => 'z-icon-es-help',
            );
        }
        return $links;
    }
}