<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Check if there are events
if(!empty($this->items)) {
    // Load each event with modal
    foreach ($this->items as $i => $event) { ?>
        <!-- Event rectangle -->
        <div class="fixed-rectangle">
            <i class="triangle-topright pull-right" style="border-top-color:<?php echo $event->event_type_color; ?> "></i>
            <div class="event-text" style="font-size:<?php echo $event->event_type_font; ?> ">
                <p><?php echo $event->title; ?></p>
                <p><?php echo date('d-m-y', strtotime($event->start_date)); ?></p>
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
                    <p>Tijd: <?php echo date('H:i',strtotime($event->start_time)) ?> - <?php echo date('H:i',strtotime($event->end_time)) ?></p>
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

<?php }}
// else load message
?>


<style>

    .triangle-topright {
        border-top: 50px solid red;
        border-left: 50px solid transparent;
    }
    .fixed-rectangle {
        background-color: #ffffff;
        border: 1px solid #dadada;
        margin-bottom: 7px;
    }
    .event-text{
        font-size: 18px;
        margin: 15px 0px 15px 18px;
    }
</style>

