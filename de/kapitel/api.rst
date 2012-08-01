Die Verwendung von API-Funktionen
=================================

Eine API-Funktion anlegen
-------------------------

Jedes Modul kann API-Funktionen anbieten. Diese können von allen Modulen verwendet werden. Wir wollen nun eine API-Funktion anlegen, die ``Hello World`` zurückgibt. Dazu erstellen wir eine User API:

``modules/ExampleModule/lib/ExampleModule/Api/User.php``

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
    class ExampleModule_Api_User extends Zikula_AbstractController
    {
        /**
         * This method provides a generic item list overview.
         *
         * @return string
         */
        public function halloWorld()
        {
            return 'Hallo Welt';
        }
    }
  
  
Eine API-Funktionen aufrufen
----------------------------  
    
Die Funktion können wir nun z.B. in einem Controller ausführen:
 
``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

.. code-block:: php

    public function main()
    {
        if (!SecurityUtil::checkPermission('ExampleModule::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        
        
        $text = ModUtil::apiFunc('ExampleModule', 'user', 'halloWorld')
        $this->view->assign('text', $text);
        return $this->view->fetch('user/main.tpl');
    }

``modules/ExampleModule/templates/user/main.tpl``
    
.. code-block:: smarty

    {$text}
    
Die API-Funktion kann auch direkt in ein Template eingbunden werden:


``modules/ExampleModule/templates/user/main.tpl``
    
.. code-block:: smarty

    {modapifunc modname='ExampleModule' type='user' func='halloWorld'}

Eine API-Funktion mit Parametern anlegen
----------------------------------------

Nürlich kann eine API-Funktion auch eingehene Parameter behandeln.

``modules/ExampleModule/lib/ExampleModule/Api/User.php``

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
    class ExampleModule_Api_User extends Zikula_AbstractController
    {
        /**
         * Sum two parameters
         *
         * @return string
         */
        public function addition($args)
        {
            if (!isset($args['a']) || !isset($args['b']) || !is_int($args['a']) || !is_int($args['b'])) {
                LogUtil::registerArgsError();
            }
            
            return $args['a']+$args['b'];
        }
    }
    
Eine API-Funktionen mit Parametern aufrufen
-------------------------------------------
    
Die Funktion können wir nun z.B. in einem Controller ausführen:
 
``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

.. code-block:: php

    public function main()
    {
        if (!SecurityUtil::checkPermission('ExampleModule::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        
        
        $paramters = array(
                     'a' => 1,
                     'b' => 3
                     );
        $result = ModUtil::apiFunc('ExampleModule', 'user', 'addition', $paramters);
        $this->view->assign('result', $result);
        return $this->view->fetch('user/main.tpl');
    }

``modules/ExampleModule/templates/user/main.tpl``
    
.. code-block:: smarty

    {$result}
    
Die API-Funktion kann auch direkt in ein Template eingbunden werden:


``modules/ExampleModule/templates/user/main.tpl``
    
.. code-block:: smarty

    {modapifunc modname='ExampleModule' type='user' func='addition' a=1 b=2}
