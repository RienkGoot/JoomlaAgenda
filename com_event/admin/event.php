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

// import joomla controller library
jimport('joomla.application.component.controller');

// Access check: is this user allowed to access the backend of this component?
if (!JFactory::getUser()->authorise('core.manage', 'com_event'))
{
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Get an instance of the controller prefixed by Event
$controller = JControllerLegacy::getInstance('Event');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();