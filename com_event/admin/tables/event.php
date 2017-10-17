<?php
/**
 * @package     com_event
 * @author      Rienk
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// import Joomla table library
jimport('joomla.database.table');

/**
 * Construct a database object on the id column from events table.
 *
 * @subpackage  Table
 * @since       1.0
 */
class EventTableEvent extends JTable
{
    /**
     * Constructor
     * @param object Database connector object
     * @since 1.6
     */
	function __construct(&$db)
	{
		parent::__construct('#__events', 'id', $db);
	}
}