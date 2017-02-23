<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Version property manager
*/
trait Version_Manager
{
    /**
    * Gets the ver field.
    */
    public function getVer()
    {
        if (array_key_exists('ver', $this->_data)) { return $this->_data['ver']; }
        return NULL;
    }

    /**
    * Sets the ver field.
    */
    public function setVer($ver)
    {
        $this->_data['ver'] = $ver;
    }
}
