<?php
/**
 * @package     com_event
 * @author      Rienk
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * View class, pass the events to view.
 *
 * @subpackage  View
 * @since       1.0
 */
class EventViewEvent extends JViewLegacy
{
    /**
     * Overwriting JView display method
     * @param null $tpl
     * @return bool
     * @since 1.1
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