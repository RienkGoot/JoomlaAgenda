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
// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * Model class creates a constructor for the search field and build a query to get all events.
 *
 * @subpackage  Model
 * @since       1.0
 */

class EventModelEvents extends JModelList
{
    /**
     * Constructor for the search filter
     * @param   array  $config  An optional associative array of configuration settings.
     * @see     JController
     * @since   1.6
     */
    public function __construct($config = array())
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(
                'id',
                'title',
            );
        }

        parent::__construct($config);
    }

    /**
     * Method to build an SQL query to load the list data.
     * @return JDatabaseQuery An SQL query
     * @since 1.1
     */
	protected function getListQuery()
	{
		// Create a new query object.
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select all fields
		$query->select('*');
		// From the events table
		$query->from('#__events');

        // Filter: like / search
        $search = $this->getState('filter.search');

        if (!empty($search))
        {
            $like = $db->quote('%' . $search . '%');
            $query->where('title LIKE ' . $like);
        }

        // Add the list ordering clause.
        $orderCol	= $this->state->get('list.ordering', 'title');
        $orderDirn 	= $this->state->get('list.direction', 'asc');

        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));

		return $query;
	}
}