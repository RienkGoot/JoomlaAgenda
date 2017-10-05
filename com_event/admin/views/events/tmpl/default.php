<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);

?>
<form action="index.php?option=com_event&view=events" method="post" id="adminForm" name="adminForm">
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
                        <div class="square" style="background-color:<?php echo $row->event_type_color; ?>;">
                            <div class="right-type">
                            <?php echo $row->event_type; ?>
                            </div>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="5">
                <?php echo $this->pagination->getListFooter(); ?>
            </td>
        </tr>
        </tfoot>
    </table>
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="boxchecked" value="0"/>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
    <?php echo JHtml::_('form.token'); ?>
</form>
<style>
    .square {
        width: 15px;
        height: 15px;
        border: 1px solid black;
        border-radius: 3px;
    }
    .right-type{
        padding-left: 19px;
    }
</style>