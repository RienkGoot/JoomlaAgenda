<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * Class EventController
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
		$input->set('view', $input->getCmd('view', 'Events'));

		// call parent behavior
		parent::display($cachable);
	}
}