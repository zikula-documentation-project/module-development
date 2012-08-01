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
        // Initialisation successful.
        return true;
    }


    /**
     * Upgrade the errors module from an old version
     *
     * This function must consider all the released versions of the module!
     * If the upgrade fails at some point, it returns the last upgraded version.
     *
     * @param  string $oldVersion   version number string to upgrade from
     *
     * @return mixed  true on success, last valid version string or false if fails
     */
    public function upgrade($oldversion)
    {
        // Update successful
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
        // Remove module vars.
        $this->delVars();

        // Deletion successful.
        return true;
    }

}