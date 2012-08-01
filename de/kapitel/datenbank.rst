Datenbankzugriffe mit Doctrine2
================================

Datenbanken definieren
----------------------

Bei Doctrine2 müssen wie schon bei DBUtil in der tables.php die Datenbanken definiert werden. Hier ein einfaches Beispiel für die Datenbank examplemodule_persons:

``modules/ExampleModule/lib/ExampleModule/Entity/Persons.php``

.. code-block:: php

    <?php
    
    use Doctrine\ORM\Mapping as ORM;
    
    /**
     * Persons entity class.
     *
     * Annotations define the entity mappings to database.
     *
     * @ORM\Entity
     * @ORM\Table(name="examplemodule_persons")
     */
    class ExampleModule_Entity_Persons extends Zikula_EntityAccess
    {
    
        /**
         * The following are annotations which define the id field.
         *
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;
    
        
        /**
         * The following are annotations which define the name field.
         *
         * @ORM\Column(type="string", length="255")
         */
        private $name;
        
        
        /**
         * The following are annotations which define the birthday field.
         * 
         * @ORM\Column(type="datetime")
         */
        private $birthday;
        
        
        /**
         * The following are annotations which define the married field.
         * 
         * @ORM\Column(type="boolean")
         */
        private $married = false;
        
    
        public function getId()
        {
            return $this->id;
        }
        
        public function getName()
        {
            return $this->name;
        }
        
        public function getBirthday()
        {
            return $this->birthday;
        }
        
        public function gettopic_status()
        {
            return $this->topic_status;
        }
        
        
        public function gettopic_time()
        {
            return $this->topic_time;
        }
        
        
        public function getMaried()
        {
            return $this->maried;
        }
    
    
        public function gettopic_views()
        {
            return $this->topic_views;
        }
        
           
        public function setName($name)
        {
            $this->name = $name;
        }
        
        public function setBirthday($birthday)
        {
            $this->birthday = $birthday;
        }
        
        public function setMarried($married)
        {
            $this->married = $married;
        }
    
    }


Datenbank erstellen
-------------------

Nun können wir Zikula die Datenbank erstellen lassen. Meistens lässt man den Installer dies machen. Bevor wir diesen nun aber modifizieren sollten wir zunächst unser ExampleModule nochmals vollkommen deinstallieren. Dannach können wir den Installer wie folgt verändern:

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
            // Create database tables.
            try {
                DoctrineHelper::createSchema($this->entityManager, array(
                    'ExampleModule_Entity_Persons'
                ));
            } catch (Exception $e) {
                return false;
            }
            
    
            // Initialisation successful.
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
             // Drop database tables
            DoctrineHelper::dropSchema($this->entityManager, array(
                'ExampleModule_Entity_Persons'
            ));
            
            // Remove module vars.
            $this->delVars();
            
            // Deletion successful.
            return true;
        }

    }
    
Nachdem wir das Modul wieder installiert haben sollte die Datenbank zur Verfügung stehen.


Einen Datenbankeintrag erstellen
--------------------------------

.. code-block:: php

    $person = new ExampleModule_Entity_Persons();
    $person->setName('Joe Bloggs');
    $this->entityManager->persist($person);
    $this->entityManager->flush();

Einen Datenbankeintrag mit einer bestimmten ID anzeigen
-------------------------------------------------------

.. code-block:: php

    $id = 2;
    $person = $this->entityManager->find('ExampleModule_Entity_Persons', $id);
    $name = $person->getName();

Datenbankeintrag mit einem bestimmten Kiterien anzeigen
-------------------------------------------------------

.. code-block:: php

    $search = array('name' => 'Joe Bloggs')
    $person = $this->entityManager->getRepository('ExampleModule_Entity_Persons')->findOneBy($search);
    
Komplexere Datenbankabfragen
----------------------------

Komplexere Datenbankabfragen lassen sich mit dem QueryBuilder machen:

.. code-block:: php

    $name = Joe Bloggs';
    $em = $this->getService('doctrine.entitymanager');
    $qb = $em->createQueryBuilder();
    $qb->select('p')
       ->from('ExampleModule_Entity_Persons', 'p')
       ->where('p.name = :name')
       ->setParameter('name', name)
       ->orderBy('p.birthday', 'DESC')
       ->setMaxResults(3);
    $persons = $qb->getQuery()->getArrayResult();
    
    
Einen Datenbankeintrag löschen
------------------------------

.. code-block:: php

    $id = 2;
    $person = $this->entityManager->find('ExampleModule_Entity_Persons', $id);
    $this->entityManager->remove($person);
    $this->entityManager->flush();
    
    
Ein simples Anwendungsbeispiel
------------------------------

Zusammen mit den Bereits oben erstellen Datei Persons.php und dem modifizierten Installer lässt sich nun leicht ein simples Anwendungsbeispiel zusammenstellen. Als erstes erstellen wir eine Datei die alle Einträge sprich Personen aus der Datenbank anzeigt:

``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

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
    class ExampleModule_Controller_User extends Zikula_AbstractController
    {
        /**
         * This method provides a generic item list overview.
         *
         * @return string
         */
        public function main()
        {
            if (!SecurityUtil::checkPermission('ExampleModule::', '::', ACCESS_READ)) {
                return LogUtil::registerPermissionError();
            }
        
            $name = Joe Bloggs';
            $em = $this->getService('doctrine.entitymanager');
            $qb = $em->createQueryBuilder();
            $qb->select('p')
               ->from('ExampleModule_Entity_Persons', 'p')
               ->orderBy('p.birthday', 'ASC');
            $persons = $qb->getQuery()->getArrayResult();
            $this->view->assign('persons', $persons);
            return $this->view->fetch('user/main.tpl');
        }
        
    }
        
``modules/ExampleModule/template/user/main.tpl``

.. code-block:: smarty

    <h3>{gt text='List of all persons'}</h3>
    
    <a href="{modurl modname="ExampleModule" type="user" func="edit"}">{gt text='New person'}</a>
    
    {insert name="getstatusmsg"}

    <table class="z-datatable">
        <thead>
            <tr>
                <th>{gt text='Name'}</th>
                <th>{gt text='Actions'}</th>
            </tr>
        </thead>
        <tbody> 
            {foreach form=$persons item=$person}
            <tr class="{cycle values="z-odd,z-even"}">
                <td>$person.name</td>
                <td><a href="{modurl modname='ExampleModule' type='user' func='edit' id=$person.id}">Edit</td>
            </tr>
            {/foreach}
        </thead>
     </table>
        
Nun fügen wir nach der main noch eine Bearbeitenfunktion hinzu:    
        
``modules/ExampleModule/lib/ExampleModule/Controller/User.php``

.. code-block:: php

    public function edit()
    {
        if (!SecurityUtil::checkPermission('ExampleModule::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        
        $form = FormUtil::newForm('ExampleModule', $this);
        return $form->execute('user/edit.tpl', new ExampleModule_Handler_Edit());
    }
    
Der Handler sieht wie folgt aus:

``modules/ExampleModule/lib/ExampleModule/Handler/Edit.php``

.. code-block:: php

    <?php
    /**
     * Copyright Zikula Foundation 2010 - Zikula Application Framework
     *
     * This work is contributed to the Zikula Foundation under one or more
     * Contributor Agreements and licensed to You under the following license:
     *
     * @license MIT
     * @package ZikulaExamples_ExampleDoctrine
     *
     * Please see the NOTICE file distributed with this source code for further
     * information regarding copyright and licensing.
     */
    
    /**
     * Form handler for create and edit.
     */
    class ExampleModule_Handler_Edit extends Zikula_Form_AbstractHandler
    {
        
        private $person;
    
        /**
         * Setup form.
         *
         * @param Zikula_Form_View $view Current Zikula_Form_View instance.
         *
         * @return boolean
         */
        public function initialize(Zikula_Form_View $view)
        {
            // Get the id.
            $id = FormUtil::getPassedValue('id', null, "GET", FILTER_SANITIZE_NUMBER_INT);
            if ($id) {
                // load user with id
                $this->person = $this->entityManager->find('ExampleModule_Entity_Persons', $id);
    
                if (!$person) {
                    return LogUtil::registerError($this->__f('Person with id %s not found', $id));
                }
            } else {
                $this->person = new ExampleDoctrine_Entity_User();
            }
    
            
            // assign current values to form fields
            $view->assign($this->person->toArray());            
            return true;
        }
    
        /**
         * Handle form submission.
         *
         * @param Zikula_Form_View $view  Current Zikula_Form_View instance.
         * @param array            &$args Args.
         *
         * @return boolean
         */
        public function handleCommand(Zikula_Form_View $view, &$args)
        {
            $url = ModUtil::url('ExampleModule', 'admin', 'main' );
            if ($args['commandName'] == 'cancel') {
                return $view->redirect($url);
            }
            
            
            // check for valid form
            if (!$view->isValid()) {
                return false;
            }
    
            // load form values
            $data = $view->getValues();
            

            // merge user and save everything
            $this->person->merge($data);
            $this->entityManager->persist($this->person);
            $this->entityManager->flush();
    
            return $view->redirect($url);
        }
    }
   
Zu guter Letzt noch das Bearbeiten-Template:   
    
``modules/ExampleModule/templates/user/edit.tpl``

.. code-block:: smarty

    {adminheader}
    <div class="z-admin-content-pagetitle">
        {icon type="config" size="small"}
        <h3>{gt text="Modify person"}</h3>
    </div>
    
    {form cssClass="z-form"}
    {formvalidationsummary}
    
    <fieldset>        
        
        <div class="z-formrow">
            {formlabel for="name" __text='Name'}
            {formtextput id="name"}
        </div>
        
        <div class="z-formrow">
            {formlabel for="birthday" __text='Birthday'}
            {formdateput id="birthday" medatory=true}
        </div>
        
    </fieldset>
            
    <div class="z-formbuttons z-buttons">
        {formbutton class="z-bt-ok" commandName="save" __text="Save"}
        {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
    </div>
            
    {/form}
    
    {adminfooter}


        
    
Weitere Informationen
---------------------

Weitere Informationen und Beispiele zu doctrine2 gibt es `hier <http://doctrine-orm.readthedocs.org/en/latest/>`_.
