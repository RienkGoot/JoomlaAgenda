<?php
/**
 * @package     com_type
 * @author      Rienk
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * Controller class, Set default view name.
 *
 * @subpackage  Controller
 * @since       1.0
 */
class TypeController extends JControllerLegacy
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
		$input->set('view', $input->getCmd('view', 'Types'));

		// call parent behavior
		parent::display($cachable);
	}
}