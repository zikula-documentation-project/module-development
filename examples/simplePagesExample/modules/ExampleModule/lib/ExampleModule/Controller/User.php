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
class ExampleModule_Controller_User extends Zikula_AbstractController
{
    /**
     * Shows a page with the content 'My first page'.
     *
     * @return string
     */
    public function main()
    {
        return 'My first page.';
    }

    /**
     * Shows a page with the content 'My second page'.
     *
     * @return string
     */
    public function view()
    {
        return 'My second page.';
    }

}