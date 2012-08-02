<?php
/**
 * Copyright Zikula Foundation 2010 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license MIT
 * @package ZikulaExamples_ExampleDoctrine
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Form handler for create and edit.
 */
class ExampleModule_Handler_Edit extends Zikula_Form_AbstractHandler
{

    private $person;

    /**
     * Setup form.
     *
     * @param Zikula_Form_View $view Current Zikula_Form_View instance.
     *
     * @return boolean
     */
    public function initialize(Zikula_Form_View $view)
    {
        // Get the id.
        $id = FormUtil::getPassedValue('id', null, "GET", FILTER_SANITIZE_NUMBER_INT);
        if ($id) {
            // load user with id            
            $this->person = $this->entityManager->find('ExampleModule_Entity_Persons', $id);

            if (!$this->person) {
                return LogUtil::registerError($this->__f('Person with id %s not found', $id));
            }

            $view->assign($this->person->toArray());
        } else {
            $this->person = new ExampleModule_Entity_Persons();
        }


        // assign current values to form fields
        return true;
    }

    /**
     * Handle form submission.
     *
     * @param Zikula_Form_View $view  Current Zikula_Form_View instance.
     * @param array            &$args Args.
     *
     * @return boolean
     */
    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        $url = ModUtil::url('ExampleModule', 'user', 'main' );
        if ($args['commandName'] == 'cancel') {
            return $view->redirect($url);
        }


        // check for valid form
        if (!$view->isValid()) {
            return false;
        }

        // load form values
        $data = $view->getValues();


        // merge user and save everything
        $this->person->merge($data);
        $this->entityManager->persist($this->person);
        $this->entityManager->flush();

        return $view->redirect($url);
    }
}