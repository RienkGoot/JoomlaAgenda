<?php
// No direct access
defined('_JEXEC') or die;
?>

<div>
    <!-- Event form -->
    <form method="post" name="events_form">
        <fieldset>
            <?php echo JHtml::_( 'form.token' ); ?>
            <label for="eventName">Titel:</label>
            <input type="text" class="form-control" id="eventName" name="eventName" required>
            <label for="eventDesc">Omschrijving:</label>
            <textarea class="form-control" id="eventDesc" name="eventDesc" rows="4" required></textarea>
            <label for="eventLocation">Locatie:</label>
            <input type="text" class="form-control" id="eventLocation" name="eventLocation" required>

            <label for="eventStartDate">Begin Datum:</label>
            <input type="date" class="form-control" id="eventStartDate" name="eventStartDate" required>
            <label for="eventEndDate">Eind Datum:</label>
            <input type="date" class="form-control" id="eventEndDate" name="eventEndDate">

            <label for="eventStartTime">Begin Tijd:</label>
            <input type="time" class="form-control" id="eventStartTime" name="eventStartTime" required>
            <label for="eventEndTime">Eind Tijd:</label>
            <input type="time" class="form-control" id="eventEndTime" name="eventEndTime" required>

            <label for="eventType">Evenement Type:</label>
            <input type="text" class="form-control" id="eventType" name="eventType">
            <label for="eventColor">Type kleur:</label>
            <input type="color" class="form-control" id="eventColor" name="eventColor" value="#000">
            <label for="eventFont">Type lettergrootte:</label>
            <select class="form-control" id="eventFont" name="eventFont">
                <option>Klein</option>
                <option>Normaal</option>
                <option>Groot</option>
            </select>

        </fieldset>
        <input type="submit" name="submitBtn" class="btn btn-default" value="Evenement aanmaken">
    </form>

</div>
