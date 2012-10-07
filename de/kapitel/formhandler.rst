Die Benutzung von FormHandlern
==============================

ModifyConfig
------------

FormHandler vereinfachen die Handhabung von HTML-Formularen. Im folgenden ein Beispiel wie ein FormHandler benutzt werden kann um ModVars zu verändern:

``modules/ExampleModule/lib/ExampleModule/Controller/Admin.php``

.. code-block:: php

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
         * ModifyConfig
         *
         * @return string
         */
        public function modifyConfig()
        {
            $form = FormUtil::newForm('Dizkus', $this);
            return $form->execute('admin/modifyconfig.tpl', new Dizkus_Form_Handler_Admin_ModifyConfig());
        }
    }

``modules/ExampleModule/lib/ExampleModule/Form/Handler/ModifyConfig.php``

.. code-block:: php

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
     * This class provides a handler to the modules preferences.
     */
    class Dizkus_Form_Handler_Admin_ModifyConfig extends Zikula_Form_AbstractHandler
    {
        /**
         * Setup form.
         *
         * @param Zikula_Form_View $view Current Zikula_Form_View instance.
         *
         * @return boolean
         *
         * @throws Zikula_Exception_Forbidden If the current user does not have adequate permissions to perform this * 
         */
        function initialize(Zikula_Form_View $view)
        {
            $this->view->caching = false;
            $this->view->assign($vars);
        }
        
        /**
         * Handle form submission.
         *
         * @param Zikula_Form_View $view  Current Zikula_Form_View instance.
         * @param array            &$args Arguments.
         *
         * @return bool|void
         */
        function handleCommand(Zikula_Form_View $view, &$args)
        {
            // Security check
            if (!SecurityUtil::checkPermission('ExampleModule::', '::', ACCESS_ADMIN)) {
                return LogUtil::registerPermissionError();
            }
            
            if ($args['commandName'] == 'cancel') {
                return true;
            }
            
            
            // check for valid form
            if (!$view->isValid()) {
                return false;
            }
            $data = $view->getValues();
    
            // checkboxes 
            $this->setVars($data);
            
            return true;        
        }
    }
    
``modules/ExampleModule/templates/admin/modifyconfig.tpl``

.. code-block:: smarty

    {adminheader}
    <div class="z-admin-content-pagetitle">
        {icon type="config" size="small"}
        <h3>{gt text="Modify configuration"}</h3>
    </div>
    
    {form cssClass="z-form"}
    {formvalidationsummary}
    
    <fieldset>
        <legend>{gt text='General settings'}</legend>
        <div class="z-formrow">
            {formlabel for="itemsPerPage" __text='Item per page'}
            {formintinput id="itemsPerPage" mandatory=true}
            <em class="z-formnote z-sub">{gt text="Number of items per page"}</em>
        </div>
        
        <div class="z-formrow">
            {formlabel for="welcomeMessage" __text='Welcome message'}
            {formtextinput id="welcomeMessage" maxLength="80"}
        </div>
        
    </fieldset>
            
    <div class="z-formbuttons z-buttons">
        {formbutton class="z-bt-ok" commandName="save" __text="Save"}
        {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
    </div>
            
    {/form}
    
    {adminfooter}
   
Mit dem Wert mendatory können Inputs als obligatorisch gesetzt werden. 
    
Der Formhandler bietet folgende Input-Elemente an:

* formcategorycheckboxlist
* formcategoryselector
* formcheckbox
* formcheckboxlist
* formcontextmenuitem
* formcontextmenureference
* formcontextmenuseparator
* formdateinput
* formdropdownlist
* formdropdownrelationlist
* formemailinput
* formfloatinput
* formintinput
* formlanguageselector
* formradiobutton
* formtextinput
* formuploadinput
* formurlinput

