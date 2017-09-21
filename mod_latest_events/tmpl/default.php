<?php
// No direct access
defined('_JEXEC') or die;

//JHtmlBootstrap
JHtml::_('bootstrap.framework');

$doc=JFactory::getDocument();
$doc->addStyleSheet(JUri::root().'/modules/mod_latest_events/css/latest_events.css');

// Connect to database
$db = JFactory::getDbo();
$query = $db->getQuery(true);

$curdate = JFactory::getDate('now', new DateTimeZone('Europe/Amsterdam'))->format('Y-m-d');

// Build the query
$query->select($db->quoteName(array('id', 'title', 'description', 'start_date', 'end_date', 'start_time', 'end_time', 'location', 'event_type', 'event_type_color', 'event_type_font')));
$query->from($db->quoteName('#__agenda_events', 'a'));
$query->where($db->quoteName('start_date') .' >= '. $db->quote( $curdate )); //today and older
$query->setLimit($params->get('max_events'));
$query->order('a.start_date ASC');

$db->setQuery($query);
$results = $db->loadObjectList();

// Print the result
foreach($results as $result){
    echo '<li class="events" style="color:' . $result->event_type_color . '">' . $result->title . '<a href="#myModal'. $result->id .' " data-toggle="modal" class="right-link">Meer info..</a></li>';
}

if(empty($results)) {
    echo '<p class="centermsg">' . $params->get('no_events') . '</p>';
}
?>

<!-- Modal -->
<?php
foreach($results as $result){ ?>
<div id="myModal<?php echo "$result->id"; ?>" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <h3><?php echo "$result->title"; ?></h3>
                <p>Startdatum: <?php echo "$result->start_date"; ?></p>
                <p>Einddatum: <?php echo "$result->end_date"; ?></p>
                <p>Tijd: <?php echo "$result->start_time" ?> - <?php echo "$result->end_time" ?></p>
                <p>Locatie: <?php echo "$result->location"; ?></p>
                <p>Type: <?php echo "$result->event_type"; ?></p>
                <p>Omschrijving: <?php echo "$result->description"; ?></p>
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
            </div>
        </div>
    </div>
</div>

<?php }