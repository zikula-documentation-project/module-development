Lokalisierung
=============

Lokaliserungen in php-Dateien
-----------------------------

In den PHP-Dateien kann die Lokalisierung meist mittels der $this Variable vorgenommen werden:

.. code-block:: php

    $helloWold = $this->__('Hello World');

In Dateien die keine $this Variable zur Verfügung stellen, wie zum Beispiel die eigenen Smarty-Plugins muss folgendermassen vorgegangen werden:

.. code-block:: php

    $dom = ZLanguage::getModuleDomain('ExampleModule');
    $helloWold = __('Hello World');
    
Es können auch übersetzungen mit Variablen angelegt werden:

.. code-block:: php

    $firstName = 'Joe';
    $lastName = 'Bloggs';
    $name = $this->__f('My name is %1$s %2$s', array($firstName, $lastName);

Lokaliserungen in Smarty-Templates
----------------------------------

In Smarty-Templates funktionieren Lokaliserungen wie folgt:

.. code-block:: smarty

     {gt text="Hello world"}
     {gt text="Hello %s" tag1=$name}
     {gt text="You want one cup" plural="You want two cups" count=2}
     {gt text='Hello %1$s, welcome to %2$s' tag1=$city tag2=$country comment="%1 is a name %2 is the place"}


Die Lokaliserungsdateien erstellen
----------------------------------

.. note::

    Diese Lösung funktioniert nur mit Unix-artigen Betriebssystem, nicht mit Windows.

Nun kann der Code mittels gettext lokalisert werden. Dazu muss zunächst das `Lokaliserung-Modul <http://github.com/zikula-modules/Gettext/>`_ heruntergeladen und im Zikula module Ornder plaziert werden. Im folgenden gehen wir nun davon aus, dass das Zikula root directory ``/var/www/`` ist.

Jetzt müssen wir den Ordner locale anlegen:

``modules/ExampleModule/locale``

Sobald dies erledigt ist kann folgender Befehl ausgeführt werden

.. code-block:: sh

     sh /var/www/modules/Gettext/helpers/xtractcomponent.sh /var/www/modules/ExampleModule /var/www ExampleModule
     
.. warning::

    Das Script hat Probleme mit relativen Pfaden.
    
