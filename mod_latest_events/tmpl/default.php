<?php
/**
 * @package     mod_latest_events
 * @author      Rienk
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

// Check if there are events
if(!empty($events))
{
// Foreach event create a block in the list with it's own modal
    foreach($events as $event)
    {
        ?>
        <!-- Rectangle event block -->
        <div class="fixed-rectangle">
            <i class="triangle-topright pull-right" style="border-top-color:<?php echo $event->event_type_color; ?> "></i>
            <div class="event-text" style="font-size:<?php echo $event->event_type_font; ?>px">
                <p><?php echo $event->title; ?></p>
                <p><?php echo date('d-m-y', strtotime($event->start_date)); ?> - <?php echo date('d-m-y',strtotime($event->end_date));?></p>
                <p><?php echo $event->location; ?></p>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#eventModal<?php echo $event->id; ?>">Meer info..</button>
            </div>
        </div>

        <!-- Modal -->
        <div id="eventModal<?php echo $event->id; ?>" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3><?php echo $event->title; ?></h3>
                        <p>Startdatum: <?php echo date('d-m-y',strtotime($event->start_date)); ?></p>
                        <p>Einddatum: <?php echo date('d-m-y',strtotime($event->end_date)); ?></p>
                        <p>Tijd: <?php echo date('h:i',strtotime($event->start_time)) ?> - <?php echo date('h:i',strtotime($event->end_time)) ?></p>
                        <p>Locatie: <?php echo $event->location; ?></p>
                        <p>Type: <?php echo $event->event_type; ?></p>
                        <p>Omschrijving: <?php echo $event->description; ?></p>
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
}
// If empty show config message
else
{
    echo $params->get('no_events');
}