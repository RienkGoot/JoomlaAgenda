<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * Class EventControllerEvents
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
     * @since 1.0
     */
	public function getModel($name = 'Event', $prefix = 'EventModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}