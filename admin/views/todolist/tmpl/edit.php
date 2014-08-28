<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_todolist&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm">
    <div class="form-horizontal">
        <fieldset class="adminform">
			<?php foreach ($this->form->getFieldset() as $field): ?>
			<div class="control-group">
				<div class="control-label"><?php echo JText::_($field->label); ?></div>
				<div class="controls">
					<?php echo $field->input; ?>
				</div>
			</div>
			<?php endforeach; ?>
        </fieldset>
    </div>
    <input type="hidden" name="task" value="todolist.edit" />
    <?php echo JHtml::_('form.token'); ?>
</form>