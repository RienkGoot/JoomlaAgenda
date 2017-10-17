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

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * Controller class to get the event model.
 *
 * @subpackage  Controller
 * @since       1.0
 */
class EventControllerEvents extends JControllerAdmin
{
    /**
     * Proxy for getModel.
     * @param string $name
     * @param string $prefix
     *
     * @return bool|JModelLegacy
     *
     * @since 1.1
     */
	public function getModel($name = 'Event', $prefix = 'EventModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}