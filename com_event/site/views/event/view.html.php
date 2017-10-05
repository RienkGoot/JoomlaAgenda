<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 *  HTML View class for the events component
 * @package com_events
 * @since 1.0
 */
class EventViewEvent extends JViewLegacy
{
    /**
     * Overwriting JView display method
     * @param null $tpl
     * @since 1.0
     * @return bool
     */
    function display($tpl = null)
    {
        // Get data from the model
        $items  = $this->get('Items');
        // Assign data to the view
        $this->items      = $items;

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

            return false;
        }

        // Display the view
        parent::display($tpl);
    }
}