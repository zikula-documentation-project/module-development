Die Grundstruktur erstellen
===========================

Jedes Modul muss eine Version.php und eine Installer.php besitzen. Im Folgenden nun Beispiele für ein einfaches Modul mit dem Namen ``ExampleModule``.

Version.php
-----------

Die Datei Version.php beinhaltet eine Beschreibung des Modules. In ihr können Werte wie zum Beispiel der Name, eine Beschreibung oder die Versionsnummer des Modules festgelegt werden.

``modules/ExampleModule/lib/ExampleModule/Version.php``

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
     * Version.
     */
    class ExampleModule_Version extends Zikula_AbstractVersion
    {
        /**
         * Module meta data.
         *
         * @return array Module metadata.
         */
        public function getMetaData()
        {
            $meta = array();
            $meta['displayname']    = $this->__('ExampleModule');
            $meta['description']    = $this->__("An simple example module.");
            //! module name that appears in URL
            $meta['url']            = $this->__('examplemodule');
            $meta['version']        = '1.0.0';
            return $meta;
        }
    }

-  ``displayname``: Der Anzeigename des Moduls.
-  ``description``: Eine kurze Beschreibung was das Modul macht. 
-  ``url``: Der Name des Moduls in der url (z.b. http://localhost/index.php?module=ExampleModule).
-  ``version``: Die Versionsnummer des Moduls. Die Nummer muss dreistellig sein (z.B. 1.23.2)! 

Installer.php
-------------

``modules/ExampleModule/lib/ExampleModule/Installer.php``

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
     * Installer.
     */
    class ExampleModule_Installer extends Zikula_AbstractInstaller
    {
    
        /**
         * Install the ExampleModule module.
         *
         * This function is only ever called once during the lifetime of a particular
         * module instance.
         *
         * @return boolean True on success, false otherwise.
         */
        public function install()
        {
    
            // Initialisation successful.
            return true;
        }


        /**
         * Upgrade the errors module from an old version
         *
         * This function must consider all the released versions of the module!
         * If the upgrade fails at some point, it returns the last upgraded version.
         *
         * @param  string $oldVersion   version number string to upgrade from
         *
         * @return mixed  true on success, last valid version string or false if fails
         */
        public function upgrade($oldversion)
        {
            // Update successful
            return true;
        }

    
        /**
         * Uninstall the module.
         *
         * This function is only ever called once during the lifetime of a particular
         * module instance.
         *
         * @return bool True on success, false otherwise.
         */
        public function uninstall()
        {
            // Remove module vars.
            $this->delVars();
            
            // Deletion successful.
            return true;
        }

    }


Installation
------------

Nachdem die beiden Dateien angelegt worden sind kann das Modul aus dem Zikula Adminbereich heraus installiert werden. Funktionen hat das Modul noch keine.

.. note::

    Das Beispielmodul mit dem aktuellen Stand gibt es `hier <./../../examples/basicExample.zip>`_.
