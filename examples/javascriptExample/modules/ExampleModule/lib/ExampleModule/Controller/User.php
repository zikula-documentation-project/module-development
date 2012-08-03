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
     * This page redirect to example1.
     *
     * @return string
     */
    public function main()
    {
        $url = ModUtil::url('ExampleModule', 'user', 'example1');
        return System::redirect($url);
    }


    /**
     * This page which shows a status message.
     *
     * @return string
     */
    public function example1()
    {
        return $this->view->fetch('user/example1.tpl');
    }

    public function example2()
    {
        $this->view->assign('text', 'Hello World');
        return $this->view->fetch('user/example2.tpl');
    }

    public function example3()
    {
        return $this->view->fetch('user/example3.tpl');
    }

    public function example4()
    {
        PageUtil::addVar('javascript', 'modules/ExampleModule/javascript/test.js');
        return $this->view->fetch('user/example4.tpl');
    }

    public function example5()
    {
        return $this->view->fetch('user/example5.tpl');
    }

    public function example6()
    {
        return $this->view->fetch('user/example6.tpl');
    }

}