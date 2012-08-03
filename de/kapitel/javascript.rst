Die Einbindung von Javascript
=============================

Einbindung von Javascript-Code
------------------------------

Javascript-Code kann wie bei normalen HTML-Seiten direkt eingebunden werden. In einem Smarty-Template sieht das wie folgt aus: 

.. code-block:: smarty
  
    <script type="text/javascript">
        alert('Hello World');
    </script>

Smarty-Ausdrücke innerhalb der Script-Tags müssen mit zwei geschweiften Klammern begrenzt werden:

.. code-block:: smarty
  
    <script type="text/javascript">
        alert('{{$text}}');
    </script>


Einbindung von Javascript-Dateien
---------------------------------

Neben der direkten Einbindung können auch exterene Javascript-Dateien eingebunden werden:

.. code-block:: smarty
  
    {pageaddvar name='javascript' value='modules/ExampleModule/javascript/test.js'}

Benutzung von Prototype
-----------------------

.. code-block:: smarty

    <div id='test'>Test div.</div>
    {pageaddvar name='javascript' value='prototype'}
    <script type="text/javascript">
        var newElement = new Element( 'p' );
        newElement.update('Text was inserted by Prototype.');
        $('test').insert ({'after': newElement} );
    </script>


Benutzung von jQuery
--------------------

Statt dem überlichen ``$`` muss ein ``jQuery`` verwendet werden:

.. code-block:: smarty

    <div id='test'>Test div.</div>
    {pageaddvar name='javascript' value='jquery'}
    <script type="text/javascript">
        jQuery('<p>Text was inserted by jQuery.</p>').insertAfter('#test');
    </script>

.. note::

    Das Beispielmodul mit dem aktuellen Stand gibt es `hier <./../../examples/javascriptExample.zip>`_.