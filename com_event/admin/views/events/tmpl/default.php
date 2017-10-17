<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);

?>
<!-- Create event form -->
<form action="index.php?option=com_event&view=events" method="post" id="adminForm" name="adminForm">

    <!-- Search bar -->
    <div class="row-fluid">
        <div class="span6">
            <?php echo JText::_('Zoeken'); ?>
            <?php
            echo JLayoutHelper::render(
                'joomla.searchtools.default',
                array('view' => $this)
            );
            ?>
        </div>
    </div>

    <!-- Event table -->
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th width="2%">
                <?php echo JHtml::_('grid.checkall'); ?>
            </th>
            <th width="1%"><?php echo JText::_('ID'); ?></th>
            <th>
                <?php echo JText::_('Titel'); ?>
            </th>
            <th>
                <?php echo JText::_('Startdatum'); ?>
            </th>
            <th>
                <?php echo JText::_('Eindddatum'); ?>
            </th>
            <th>
                <?php echo JText::_('Tijd'); ?>
            </th>
            <th>
                <?php echo JText::_('Locatie'); ?>
            </th>
            <th>
                <?php echo JText::_('Type'); ?>
            </th>
        </tr>
        </thead>
        <tbody>
        <!-- Display event data -->
        <?php if (!empty($this->items)) : ?>
            <?php foreach ($this->items as $i => $row) :
                $link = JRoute::_('index.php?option=com_event&task=event.edit&id=' . $row->id);
                ?>
                <tr>
                    <td>
                        <?php echo JHtml::_('grid.id', $i, $row->id); ?>
                    </td>
                    <td><?php echo $this->pagination->getRowOffset($i); ?></td>
                    <td>
                        <?php echo $row->title; ?>
                    </td>
                    <td>
                        <?php echo date('d-m-y',strtotime($row->start_date)); ?>
                    </td>
                    <td>
                        <?php echo date('d-m-y',strtotime($row->end_date)); ?>
                    </td>
                    <td>
                        <?php echo date('H:i',strtotime($row->start_time)) ?> -  <?php echo date('H:i',strtotime($row->end_time)) ?>
                    </td>
                    <td>
                        <?php echo $row->location; ?>
                    </td>
                    <td>
                        <?php echo $row->event_type; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
	<?php echo $this->pagination->getListFooter(); ?>
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="boxchecked" value="0"/>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
    <?php echo JHtml::_('form.token'); ?>
</form>