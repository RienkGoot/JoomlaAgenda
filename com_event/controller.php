<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * General Controller of Events component
 * @package com_events
 * @since 1.0
 */
class EventController extends JControllerLegacy
{
    /**
     * display task
     *
     * @param bool $cachable
     * @param bool $urlparams
     * @since 1.0
     * @return void
     */
    function display($cachable = false, $urlparams = false)
    {
        // set default view if not set
        $input = JFactory::getApplication()->input;
        $input->set('view', $input->getCmd('view', 'Event'));

        // call parent behavior
        parent::display($cachable);
    }
}