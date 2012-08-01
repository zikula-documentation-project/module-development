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