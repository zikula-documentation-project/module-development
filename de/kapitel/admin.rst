Einen Admin-Bereich anlegen
===========================

Admin-Seiten
------------

Das Anlegen eines Admin-Bereichs ist sehr ähnlich zum anlegen einer normalen Seite. Zunächst müssen wir einen Admin-Controller anlegen:

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
         * This method provides a page which shows 'Hello World 1'
         *
         * @return string
         */
        public function main()
        {
            return $this->view->fetch('admin/main.tpl');
        }
        
        /**
         * This method provides a page which shows 'Hello World 2'
         *
         * @return string
         */
        public function main2()
        {
            return $this->view->fetch('admin/main2.tpl');
        }
    }

``modules/ExampleModule/templates/user/main.tpl``

.. code-block:: smarty

    {adminheader}

    <div class="z-admin-content-pagetitle">
        {icon type="config" size="small"}
        <h3>{gt text="Hello world 1"}</h3>
    </div>
    {gt text="Hello world 1"}

    {adminfooter}

``modules/ExampleModule/templates/user/main2.tpl``

.. code-block:: smarty

    {adminheader}

    <div class="z-admin-content-pagetitle">
        {icon type="config" size="small"}
        <h3>{gt text="Hello world 2"}</h3>
    </div>
    {gt text="Hello world 2"}

    {adminfooter}

Die Seiten sind nun unter http://localhost/index.php?module=ExampleModule&type=admin&func=main und http://localhost/index.php?module=ExampleModule&type=admin&func=main2 erreichbar.

Die Admin Bar
-------------

Damit wir zwischen den beiden Seiten auch per Klick hin und her wechseln können brauchen wir eine Admin-Bar. Die Admin-Bar können wir als Funktion in der Admin API anlegen:

``modules/ExampleModule/lib/ExampleModule/Api/Admin.php``

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

 .. note::

     Das Beispielmodul mit dem aktuellen Stand gibt es `hier <./../../examples/adminExample.zip>`_.

Das Modul-Icon
--------------

Damit im Admin-Bereich das Modul ein Icon erhält müssen wir eine PNG Datei an folgenden Ort kopieren:

``modules/ExampleModule/images/admin.png``