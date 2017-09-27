<?php
// No direct access
defined('_JEXEC') or die;

// Get current date
$curdate = JFactory::getDate('now', new DateTimeZone('Europe/Amsterdam'))->format('Y-m-d');

// Connect to database and build the query
$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select('*');
$query->from($db->quoteName('#__events', 'a'));
$query->where($db->quoteName('start_date') .' >= '. $db->quote( $curdate )); //today and older
$query->setLimit($params->get('max_events'));
$query->order('a.start_date ASC');

$db->setQuery($query);
$events = $db->loadObjectList();

// Display each event
foreach($events as $event){
    ?>
    <div class="fixed-rectangle">

        <i class="triangle-topright pull-right" style="border-top-color:<?php echo $event->event_type_color; ?> "></i>
        <div class="event-text" style="font-size:<?php echo $event->event_type_font; ?> ">
            <p><?php echo $event->title; ?></p>
            <p><?php echo date('d-m-y',strtotime($event->start_date)); ?></p>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#eventModal<?php echo $event->id; ?>">Meer info..</button>
        </div>

    </div>
<?php }

if(empty($events)) {
    echo '<p class="centermsg">' . $params->get('no_events') . '</p>';
}

foreach($events as $event){ ?>
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

<?php }