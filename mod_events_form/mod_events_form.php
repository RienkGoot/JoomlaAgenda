<?php

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

// If submit button is pressed, get all form info with jinput
if (isset($_POST['submitBtn'])){

    // Check CSRF token is valid
    JSession::checkToken() or die( 'Invalid Token' );

    // Create object to use JInput
    $jinput = JFactory::getApplication()->input;

    $eventValues = $jinput->getArray([
        'eventName' => 'html',
        'eventDesc' => 'html',
        'eventStartDate' => 'html',
        'eventEndDate' => 'html',
        'eventStartTime' => 'html',
        'eventEndTime' => 'html',
        'eventLocation' => 'html',
        'eventType' => 'html',
        'eventColor' => 'html',
        'eventFont' => 'html',
    ]);

    if (modEventsFormHelper::saveData($eventValues)){
    echo "U heeft succesvol een nieuw evenement aangemaakt.";
    }
    else{
        echo "Kan formulier niet verzenden.";
    }
}

else {
    require JModuleHelper::getLayoutPath('mod_events_form');
}
