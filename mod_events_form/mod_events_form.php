<?php

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

// If submit button is pressed, get all form info with jinput.
if (isset($_POST['submitBtn'])){
    $jinput = JFactory::getApplication()->input;
    $eventName = $jinput->getHtml('eventName','');
    $eventDesc = $jinput->getHtml('eventDesc','');
    $eventLocation = $jinput->getHtml('eventLocation','');
    $eventStartDate = $jinput->get('eventStartDate','','');
    $eventEndDate = $jinput->get('eventEndDate','','');
    $eventStartTime = $jinput->get('eventStartTime','','');
    $eventEndTime = $jinput->get('eventEndTime','','');
    $eventType = $jinput->getHtml('eventType','');
    $eventColor = $jinput->get('eventColor','','');
    $eventFont = $jinput->get('eventFont','','');

    if (modEventsFormHelper::saveData($eventName, $eventDesc, $eventLocation, $eventStartDate, $eventEndDate, $eventStartTime, $eventEndTime, $eventType, $eventColor, $eventFont)){
    echo "Succesvol evenement aangemaakt.";
    }


}
else {
    require JModuleHelper::getLayoutPath('mod_events_form');
}
