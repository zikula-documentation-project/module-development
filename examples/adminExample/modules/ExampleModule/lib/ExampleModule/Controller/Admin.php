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
class ExampleModule_Controller_Admin extends Zikula_AbstractController
{
    /**
     * Q page which shows a status message.
     *
     * @return string
     */
    public function main()
    {
        return $this->view->fetch('admin/main.tpl');
    }

    public function main2()
    {
        return $this->view->fetch('admin/main2.tpl');
    }
}