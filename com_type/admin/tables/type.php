<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

// import Joomla table library
jimport('joomla.database.table');

/**
 * Class TypeTableType
 */
class TypeTableType extends JTable
{
    /**
     * Constructor
     * @param object Database connector object
     */
	function __construct(&$db)
	{
		parent::__construct('#__events_types', 'id', $db);
	}
}