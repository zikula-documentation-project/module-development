Erste Seiten erstellen
======================

Die erste Seite
---------------

Nachdem das ``ExampleModul`` nun eine Version.php und eine Installer.php besitzt wollen wir nun eine im Browser anzeigbare Seite erstellt werden. Dazu muss als Erstes ein User Controller Klasse erstellt werden. Dazu legen wir folgende Daten an:

``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

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
    class ExampleModule_Controller_User extends Zikula_AbstractController
    {
        /**
         * This method provides a generic item list overview.
         *
         * @return string
         */
        public function main()
        {
            return 'My first page.';
        }
    }

Die zweite Seite ist nun unter http://localhost/index.php?module=ExampleModule&type=user&func=main erreichbar.


Weitere Seiten erstellen
------------------------

Weitere Seiten können wir erstellen indem wir nach der main-Funktion weitere Funktionen anfügen:

``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

.. code-block:: php
    
    /**
     * Shows a page with the content 'My second page'.
     *
     * @return string
     */
    public function view()
    {
        return 'My second page.';
    }
    
Die zweite Seite ist unter http://localhost/index.php?module=ExampleModule&type=user&func=view erreichbar.

.. note::

    Das Beispielmodul mit dem aktuellen Stand gibt es `hier <./../../examples/simplePagesExample.zip>`_.