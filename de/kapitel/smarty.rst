Seiten mit Templates erstellen
==============================

Templates einbinden
-------------------

Um die Funktionalität und Design zu trennen unterstützt Zikula die Template-Engine Smarty. Dies macht einerseits den Code übersichtlicher und erlaubt es Themen das Layout einer Modulseite zu verändern.

Als Beispiel erweitern wir nun die bereits aus dem letzten Kapitel bekannte main-Seite. Zunächst legen wir ein Smarty-Template an:

``modules/ExampleModule/templates/user/main.tpl``

.. code-block:: smarty

    My first page.
    
Danach modifizieren wir die main-Funktion:

``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

.. code-block:: php

    public function main()
    {
        return $this->view->fetch('user/main.tpl');
    }
    
Die Seite ist nach wie vor unter http://localhost/index.php?module=ExampleModule&type=user&func=main erreichbar.

Variablen an Templates übergeben
--------------------------------

Um eine Variable an ein Template zu übergeben verwenden wir die assign-Methode

``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

.. code-block:: php

    public function main()
    {
        $this->view->assign('text', 'My first page.');
        return $this->view->fetch('user/main.tpl');
    }

Das Template können wir nun wie folgt anpassen:

``modules/ExampleModule/templates/user/main.tpl``
    
.. code-block:: smarty

    {$text}
    
Smarty-Modifikatoren verwenden
------------------------------

Ein Modifikator verändert eine gegebene Zeichenkette. Der Modifikator lower wandelt zum Beispiel alle Grossbuchstaben in Kleinbuchstaben um:

``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

.. code-block:: php

    public function main()
    {
        $this->view->assign($text, 'My first page.');
        return $this->view->fetch('user/main.tpl');
    }

``modules/ExampleModule/templates/user/main.tpl``
    
.. code-block:: smarty

    {$text|lower}

Die Ausgabe ist nun ``my first page.`` statt ``My first page.``.

Manche Modifkatoren erlauben zusätzliche Funktionsparameter:

``modules/ExampleModule/templates/user/main.tpl``
    
.. code-block:: smarty

    {$text|truncate:8:"…"}
    
Die Funktion truncate (kürzen) erlaubt zum Beispiel noch anzugeben nach wievielen Zeichen gekürzt werden soll und was am Ende Angezeigt werden soll. Das ober Beispiel würde nun ``My first...`` statt ``My first page.`` ausgeben.

Smarty offeriert folgende Modifikatoren:

* `capitalize (in Grossbuchstaben schreiben) <http://www.smarty.net/docsv2/de/language.modifiers.tpl#language.modifier.capitalize>`_
* `cat <http://www.smarty.net/docsv2/de/language.modifier.cat.tpl>`_
* `count_characters (Buchstaben zählen) <http://www.smarty.net/docsv2/de/language.modifier.count.characters.tpl>`_
* `count_paragraphs (Absätze zählen) <http://www.smarty.net/docsv2/de/language.modifier.count.paragraphs.tpl>`_
* `count_sentences (Sätze zählen) <http://www.smarty.net/docsv2/de/language.modifier.count.sentences.tpl>`_
* `count_words (Wörter zählen) <http://www.smarty.net/docsv2/de/language.modifier.count.words.tpl>`_
* `date_format (Datums Formatierung) <http://www.smarty.net/docsv2/de/language.modifier.date.format.tpl>`_
* `default (Standardwert) <http://www.smarty.net/docsv2/de/language.modifier.default.tpl>`_
* `escape (Maskieren) <http://www.smarty.net/docsv2/de/language.modifier.escape.tpl>`_
* `indent (Einrücken) <http://www.smarty.net/docsv2/de/language.modifier.indent.tpl>`_
* `lower (in Kleinbuchstaben schreiben) <http://www.smarty.net/docsv2/de/language.modifier.lower.tpl>`_
* `nl2br <http://www.smarty.net/docsv2/de/language.modifier.nl2br.tpl>`_
* `regex_replace (Ersetzen mit regulären Ausdrücken) <http://www.smarty.net/docsv2/de/language.modifier.regex.replace.tpl>`_
* `replace (Ersetzen) <http://www.smarty.net/docsv2/de/language.modifier.replace.tpl>`_
* `spacify (Zeichenkette splitten) <http://www.smarty.net/docsv2/de/language.modifier.spacify.tpl>`_
* `string_format (Zeichenkette formatieren) <http://www.smarty.net/docsv2/de/language.modifier..tpl>`_
* `strip (Zeichenkette strippen) <http://www.smarty.net/docsv2/de/language.modifier.strip.tpl>`_
* `strip_tags <http://www.smarty.net/docsv2/de/language.modifier.strip.tags.tpl>`_
* `truncate (kürzen) <http://www.smarty.net/docsv2/de/language.modifier.truncate.tpl>`_
* `upper (in Grossbuchstaben umwandeln) <http://www.smarty.net/docsv2/de/language.modifier.upper.tpl>`_
* `wordwrap (Zeilenumbruch) <http://www.smarty.net/docsv2/de/language.modifier.wordwrap.tpl>`_

Daneben bietet auch noch Zikula von Haus aus einige Modifikatoren an:

* activatelinks
* activeinactive
* const
* dateformat
* formatcurrency
* formatnumber
* formatpermalink
* getlanguagename
* gt
* htmlentities
* htmlspecialchars
* markdown
* markdownextra
* nl2paragraphs
* notifyfilters
* onlineoffline
* paragraph.php
* profilelinkbyuid.php
* profilelinkbyuname.php
* safehtml
* safetext
* sortby
* themetype
* xslt
* yesno
* zdebug_print_var

Eigene Smarty-Modifier schreiben
--------------------------------


Smarty-Funktionen verwenden
---------------------------

Neben den Modifikatoren bietet Smarty auch noch Funktionen an. Die Funktion ``assign`` ermöglicht zum Beispiel das Deinifieren von Variablen:

.. code-block:: smarty

    {assign var="name" value="Bob"}
    Der Wert von $name ist {$name}.
    
Die Zikula eigene Funktion ``modurl`` ermöglicht die Verlinkung zu anderen Seiten:

.. code-block:: smarty

    <a href="{modurl modname='Users' type='user' func='main'}">Linkt to the users module</a>


Eigene Smarty-Funktionen schreiben
----------------------------------
