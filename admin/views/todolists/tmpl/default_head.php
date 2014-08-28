<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
	<th width="1%">
		<?php echo JHTML::_( 'grid.sort', JText::_('COM_TODOLIST_HEADING_ID'), 'id', $this->sortDirection, $this->sortColumn); ?>
	</th>
	<th width="1%">
		<?php echo JHtml::_('grid.checkall'); ?>
	</th>
	<th width="">
		<?php echo JHTML::_( 'grid.sort', JText::_('COM_TODOLIST_HEADING_NAME'), 'name', $this->sortDirection, $this->sortColumn); ?>
	</th>
	<th width="">
		<?php echo JHTML::_( 'grid.sort', JText::_('COM_TODOLIST_HEADING_CATEGORY'), 'category', $this->sortDirection, $this->sortColumn); ?>
	</th>
	<th width="">
		<?php echo JHTML::_( 'grid.sort', JText::_('COM_TODOLIST_HEADING_DATE'), 'date', $this->sortDirection, $this->sortColumn); ?>
	</th>
	<th width="">
		<?php echo JHTML::_( 'grid.sort', JText::_('COM_TODOLIST_HEADING_STATUS'), 'status', $this->sortDirection, $this->sortColumn); ?>
	</th>
</tr>