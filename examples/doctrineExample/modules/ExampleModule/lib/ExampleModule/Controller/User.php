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
     * This method provides a generic item list overview.
     *
     * @return string
     */
    public function main()
    {
        if (!SecurityUtil::checkPermission('ExampleModule::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $em = $this->getService('doctrine.entitymanager');
        $qb = $em->createQueryBuilder();
        $qb->select('p')
           ->from('ExampleModule_Entity_Persons', 'p')
           ->orderBy('p.birthday', 'ASC');
        $persons = $qb->getQuery()->getArrayResult();
        $this->view->assign('persons', $persons);
        return $this->view->fetch('user/main.tpl');
    }


    /**
     * This method provides a generic item list overview.
     *
     * @return string
     */
    public function edit()
    {
        if (!SecurityUtil::checkPermission('ExampleModule::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $form = FormUtil::newForm('ExampleModule', $this);
        return $form->execute('user/edit.tpl', new ExampleModule_Handler_Edit());
    }

}