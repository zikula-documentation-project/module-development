ModVars verwenden
=================

Was sind ModVars?
-----------------

ModVars sind Modul spezigische Variablen. In ihnen können Einstellungen eines Modules dauerhaft gespeichert worden, ohne das gleich eine neue Datenbank ersrtellt werden muss.

Eine Modul-Variable speichern
-----------------------------

Das Speichern von ModVars entweder kann über die $this Variable oder das PageUtil durchgeführt werden.

.. code-block:: php

    $this->setVar('itemsPerPage', 10);
  
.. code-block:: php

   PageUtil::setVar('ExampleModule', 'itemsPerPage', 10);
   
Es können auch mehrere ModVars auf einmal gespeichert werden:

.. code-block:: php

    $modVars = array(
                'itemsPerPage' => 10,
                'welcomeMessage' => 'Hello World'
               )
    $this->setVars($modVars);
  
.. code-block:: php

   $modVars = array(
                'itemsPerPage' => 10,
                'welcomeMessage' => 'Hello World'
               )
   PageUtil::setVars('ExampleModule', $modVars);
  
Eine Modul-Variable aufrufen
----------------------------    

Das Aufrufen von Modul-Variablen kann ebenfalls entweder über die $this Variable oder das PageUtil durchgeführt werden.

.. code-block:: php

    $itemsPerPage = $this->getVar('itemsPerPage');
  
.. code-block:: php

   $itemsPerPage = PageUtil::getVar('ExampleModule', 'itemsPerPage');
   
Es können auch alle Variablen eines Modules auf einmal abgerufen werden:

.. code-block:: php

    $modVars = $this->getVars();
    $itemsPerPage = $modVars['itemsPerPage'];
  
.. code-block:: php

   $modVars = PageUtil::getVars('ExampleModule');
   $itemsPerPage = $modVars['itemsPerPage'];


Eine Modul-Variable kann auch direkt in einem Template aufgerufen werden:
    
.. code-block:: smarty

    {$modvars.ExampleModule.itemsPerPage}

Eine Modul-Variable löschen
---------------------------

Das Löschen von Modul-Variablen kann ebenfalls entweder über die $this Variable oder das PageUtil durchgeführt werden:

.. code-block:: php

    $this->delVar('itemsPerPage');
  
.. code-block:: php

   PageUtil::detVar('ExampleModule', 'itemsPerPage');
   
Es können auch alle Variablen eines Modules auf einmal gelöscht werden:

.. code-block:: php

    $this->delVars();
  
.. code-block:: php

   PageUtil::delVars('ExampleModule');


   