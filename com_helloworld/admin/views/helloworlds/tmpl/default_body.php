<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach ($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
        <td>
            <?php echo JHtml::_('grid.id', $i, $item->id); ?>
        </td>
        <td>
            <?php echo $item->title; ?>
        </td>
        <td>
            <?php echo date('d-m-y',strtotime($item->start_date)); ?>
        </td>
        <td>
            <?php echo date('d-m-y',strtotime($item->end_date)); ?>
        </td>
        <td>
            <?php echo $item->start_time ?>
        </td>
        <td>
            <?php echo $item->end_time ?>
        </td>
        <td>
            <?php echo $item->event_type; ?>
        </td>
	</tr>
<?php endforeach; ?>