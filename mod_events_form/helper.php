<?php

// No direct access
defined('_JEXEC') or die;
class modEventsFormHelper
{
    function saveData($eventName, $eventDesc, $eventLocation, $eventStartDate, $eventEndDate, $eventStartTime, $eventEndTime, $eventType, $eventColor, $eventFont){
    $db = JFactory::getDbo();
    $query = "INSERT INTO #__agenda_events (title, description, start_date, end_date, start_time, end_time, location, event_type, event_type_color, event_type_font)
VALUES ('$eventName', '$eventDesc', '$eventStartDate', '$eventEndDate', '$eventStartTime', '$eventEndTime', '$eventLocation', '$eventType', '$eventColor', '$eventFont');";
    $db->setQuery($query);
    if($db->query()){
        return true;
    }


    }
}