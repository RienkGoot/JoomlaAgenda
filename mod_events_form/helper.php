<?php

// No direct access
defined('_JEXEC') or die;

/**
 * Class modEventsFormHelper
 * @since 1.0
 */
class modEventsFormHelper
{
    /**
     * Get form data and insert it into the specified database.
     * @param $eventValues
     * @return bool
     * @since version
     */
    public function saveData($eventValues){

        // Get a db connection.
        $db = JFactory::getDbo();

        // Prepare the insert query.
        $query = "INSERT INTO #__agenda_events (title, description, start_date, end_date, start_time, end_time, location, event_type, event_type_color, event_type_font)
                  VALUES ('" . implode("','", $eventValues) . "');";

        // Set the query and execute it.
        $db->setQuery($query);

        if($db->execute()){
            return true;
        }
    }
}