<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);

?>
<!-- Create type form -->
<form action="index.php?option=com_type&view=types" method="post" id="adminForm" name="adminForm">

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

    <!-- Type table-->
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th width="2%">
                <?php echo JHtml::_('grid.checkall'); ?>
            </th>
            <th width="1%"><?php echo JText::_('ID'); ?></th>
            <th>
                <?php echo JText::_('Type'); ?>
            </th>
            <th>
                <?php echo JText::_('Lettergrootte'); ?>
            </th>
            <th>
                <?php echo JText::_('Kleur'); ?>
            </th>
        </tr>
        </thead>

        <!-- Display type data -->
        <tbody>
        <?php if (!empty($this->items)) : ?>
            <?php foreach ($this->items as $i => $row) :
                $link = JRoute::_('index.php?option=com_type&task=type.edit&id=' . $row->id);
                ?>
                <tr>
                    <td>
                        <?php echo JHtml::_('grid.id', $i, $row->id); ?>
                    </td>
                    <td><?php echo $this->pagination->getRowOffset($i); ?></td>
                    <td>
                        <?php echo $row->event_type; ?>
                    </td>
                    <td>
                        <?php echo $row->event_type_font; ?>px
                    </td>
                    <td>
                        <div class="square" style="background-color:<?php echo $row->event_type_color; ?>;"></div>
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
</style>