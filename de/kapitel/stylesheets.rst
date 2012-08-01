Die Einbindung von Stylesheets
==============================

Die style.css
-------------

Wenn wir Styles anlegen wollen, die auf jeder Seite des Modules zut Verfügung stehen sollen, dann können wir die style.css verwenden. Sie wird, sofern sie vorhanden ist automatische geladen: 

``modules/ExampleModule/syle/style.css``

.. code-block:: css
  
    div.example {
        border-style:solid;
        border-width:3px;
        border-color:red;
    }

``modules/ExampleModule/templates/user/main.tpl``

.. code-block:: smarty

    <div class="example">
        The red border is defined in modules/ExampleModule/style/style.css, which was loaded automatically.
    </div>

Spezifische Stylesheets angelegen
---------------------------------

Spezifische Stylesheets können wie Javascript-Dateien mittels pageaddvar in Smarty-Templates geladen werden:

``modules/ExampleModule/syle/blue.css``

.. code-block:: css

    div.example {
        border-style:solid;
        border-width:3px;
        border-color:blue;
    }

``modules/ExampleModule/templates/user/main2.tpl``

.. code-block:: smarty

    {pageaddvar name="stylesheet" value="modules/ExampleModule/style/blue.css"}
    <div class="example">
        The blue border is defined in modules/ExampleModule/style/blue.css, which was loaded by the smarty function pageaddvar.
    </div>

Alternativ können Stylesheets auch aus PHP heraus geladen werden:

``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

.. code-block:: php

    public function main3()
    {
        PageUtil::addVar('stylesheet', 'modules/ExampleModule/style/blue.css');
        return $this->view->fetch('user/main3.tpl');
    }

``modules/ExampleModule/templates/user/main3.tpl``


.. code-block:: smarty

    {pageaddvar name="stylesheet" value="modules/ExampleModule/style/blue.css"}
    <div class="example">
        The blue border is defined in modules/ExampleModule/style/blue.css, which was loaded by PageUtil.
    </div>

Die blue.css hat in den beiden oberen Fällen die style.css überschrieben.

.. note::

    Das Beispielmodul mit dem aktuellen Stand gibt es `hier <./../../examples/stylesheetExample.zip>`_.