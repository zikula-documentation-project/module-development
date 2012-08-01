Zugriffsrechte setzten
======================

Damit die Seite im Zikula-Rechtesystem einbezogen werden kann, fügen wir nun ein Rechte-Abfrage hinzu:

``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

.. code-block:: php

    public function main()
    {
        if (!SecurityUtil::checkPermission('ExampleModule::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        return 'This page is just viewable if the viewer has read permissions.';
    }

Die Seite kann nur noch von denjenigen Gruppen bzw. Benutzern betrachtet werden die Lese (ACCESS_READ) haben. Zikula kennt folgende Rechte-Stuffen:

* ACCESS_NONE
* ACCESS_OVERVIEW
* ACCESS_READ
* ACCESS_COMMENT
* ACCESS_MODERATE
* ACCESS_EDIT
* ACCESS_ADD
* ACCESS_DELETE
* ACCESS_ADMIN

.. note::

    Das Beispielmodul mit dem aktuellen Stand gibt es `hier <./../../examples/permissionExample.zip>`_.