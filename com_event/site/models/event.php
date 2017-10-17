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

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

// Component helper for config params
jimport('joomla.application.component.helper');

/**
 * Model class to build a query to get the events.
 *
 * @subpackage  Model
 * @since       1.0
 */
class EventModelEvent extends JModelList
{
    /**
     * Method to build an SQL query to load the list data.
     * @return JDatabaseQuery
     * @since 1.1
     */
    public function getListQuery()
    {
	    // Get config message when there are no events
	    $maxEvents = JComponentHelper::getParams('com_event')->get('max_events');
	    // Get config timezone
	    $timezoneEvents = JComponentHelper::getParams('com_event')->get('timezone_events');

        // Get current date
        $curdate = JFactory::getDate('now', new DateTimeZone($timezoneEvents))->format('Y-m-d');

        // Connect to database and build the query
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
	    // Select all from both tabels
	    $query->select(array('a.*', 'b.*'));
	    $query->from($db->quoteName('#__events', 'a'));
	    // Inner join on event_type
	    $query->join('INNER', $db->quoteName('#__events_types', 'b') . ' ON (' . $db->quoteName('a.event_type') . ' = ' . $db->quoteName('b.event_type') . ')');
		// Select between start and enddate
        $query->where($db->quote($curdate) . "BETWEEN" . $db->quoteName('start_date') . "AND" . $db->quoteName('end_date'));
        // Set the query limit
        $query->setLimit($maxEvents);
        // Ordering ascending
        $query->order('a.start_date ASC');

        return $query;
    }
}