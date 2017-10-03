<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

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

        // Connect to database and build the query
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from($db->quoteName('#__events', 'a'));
        $query->where($db->quoteName('start_date') .' >= '. $db->quote( $curdate )); //today and older
        $query->setLimit(10);
        $query->order('a.start_date ASC');

        return $query;
    }
}