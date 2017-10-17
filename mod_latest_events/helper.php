<?php
/**
 * @package     mod_latest_events
 * @author      Rienk
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

/**
 * Class EventLatestHelper
 * Executes a query to retrieve events and pass them to the view
 * @since 1.0
 */
abstract class EventLatestHelper
{
    /**
     * Retrieve a list of events
     * @param $params module config parameters
     * @return mixed events
     * @since 1.1
     */
    public static function getList(&$params)
    {
        // Get current date
        $curdate = JFactory::getDate('now', new DateTimeZone($params->get('timezone_events')))->format('Y-m-d');

        // Connect to database and build the query
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        // Select all from both tabels
        $query->select(array('a.*', 'b.*'));
        $query->from($db->quoteName('#__events', 'a'));
	    // Inner join on event_type
	    $query->join('INNER', $db->quoteName('#__events_types', 'b') . ' ON (' . $db->quoteName('a.event_type') . ' = ' . $db->quoteName('b.event_type') . ')');
        // Get events between start and enddate
        $query->where($db->quote($curdate) . "BETWEEN" . $db->quoteName('start_date') . "AND" . $db->quoteName('end_date'));
        // Limit on how many results
        $query->setLimit($params->get('max_events'));
        // Order ascending
        $query->order('a.start_date ASC');

        $db->setQuery($query);
        $events = $db->loadObjectList();

        return $events;
    }
}