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

    public function getMarried()
    {
        return $this->married;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = new DateTime($birthday);
    }

    public function setMarried($married)
    {
        $this->married = $married;
    }

}