Einen Admin-Bereich anlegen
===========================

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
            return 'Hello World 1';
        }
        
        /**
         * This method provides a page which shows 'Hello World 2'
         *
         * @return string
         */
        public function main2()
        {
            return 'Hello World 2';
        }
    }

Die Seiten sind nun unter http://localhost/index.php?module=ExampleModule&type=admin&func=main und http://localhost/index.php?module=ExampleModule&type=admin&func=main2 erreichbar.

Damit wir zwischen den beiden Seiten auch per Klick hin und her wechseln können wir eine Admin-Bar. Die Admin-Bar können wir als Funktion in der Admin API anlegen:

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
    class ExampleModule_Api_Admin extends Zikula_AbstractController
    {
        /**
         * get available admin panel links
         *
         * @return array array of admin links
         */
        public function getlinks()
        {
            $links = array();
            if (SecurityUtil::checkPermission('Dizkus::', '::', ACCESS_ADMIN)) {
                $links[] = array(
                            'url'   => ModUtil::url('Dizkus', 'admin', 'tree'),
                            'text'  => $this->__('Edit forum tree'),
                            'title' => $this->__('Create, delete, edit and re-order categories and forums'),
                            'links' => array(
                             array(
                                 'url'   => ModUtil::url('Dizkus', 'admin', 'main'),
                                 'text'  => $this->__('Hello World 1'),
                                 'title' => $this->__('Hello World 1'),
                                 'class' => 'z-icon-es-help',
                             ),
                              array(
                                 'url'   => ModUtil::url('Dizkus', 'admin', 'main2'),
                                 'text'  => $this->__('Hello World 2'),
                                 'title' => $this->__('Hello World 2'),
                                 'class' => 'z-icon-es-config',
                             )
                           )
                          );
            }
            return $links;
        }