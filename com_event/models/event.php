<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

// Component helper for config params
jimport('joomla.application.component.helper');

/**
 * Event Model
 * @package com_events
 * @since 1.0
 */
class EventModelEvent extends JModelList
{
    /**
     * Method to build an SQL query to load the list data.
     * @return JDatabaseQuery
     * @since 1.0
     */
    public function getListQuery()
    {
        // Get current date
        $curdate = JFactory::getDate('now', new DateTimeZone('Europe/Amsterdam'))->format('Y-m-d');

        // Get config message when there are no events
        $emptyEvents = JComponentHelper::getParams('com_event')->get('max_events');

        // Connect to database and build the query
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from($db->quoteName('#__events', 'a'));
        $query->where($db->quote($curdate) . "BETWEEN" . $db->quoteName('start_date') . "AND" . $db->quoteName('end_date')); //today and older
        $query->setLimit($emptyEvents);
        $query->order('a.start_date ASC');

        return $query;
    }
}