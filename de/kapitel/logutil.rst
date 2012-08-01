Status-Nachrichten anzeigen
===========================

Zikula besitzt ein System zum Anzeigen von Status-Nachrichten.

``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

.. code-block:: php

    public function main()
    {
        LogUtil::registerStatus('My first status message.');
        return $this->view->fetch('user/main.tpl');
    }

Damit die Status-Nachricht angezeigt wird kann in Smarty die Funktion ``insert`` verwendet werden:

``modules/ExampleModule/templates/user/main.tpl``

.. code-block:: smarty

    {insert name='getstatusmsg'}

Im Admin-Bereich wird diese nicht benötigt. Dort werden Statusnachrichten automatische angezeigt.

Insgesamt besitzt Zikula folgende Benachrichtigungstypen:

* LogUtil::registerArgsError();
* LogUtil::registerAuthidError();
* LogUtil::registerError();
* LogUtil::registerPermissionError();
* LogUtil::registerStatus();

.. note::

    Das Beispielmodul mit dem aktuellen Stand gibt es `hier <./../../examples/logutilExample.zip>`_.