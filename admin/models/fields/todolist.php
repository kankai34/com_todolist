<?php
// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * ToDoList Form Field class for the ToDoList component
 */
class JFormFieldToDoList extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'ToDoList';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return      array           An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('a.id as id, a.name as name, a.date as date, a.status as status, a.catid as catid, b.title as category');
		$query->from('#__todolist a');
		$query->leftJoin('#__categories b on a.catid = b.id');
		$db->setQuery((string) $query);
		$messages = $db->loadObjectList();
		$options  = array();
		if ($messages)
		{
			foreach ($messages as $message)
			{
				#$options[] = JHtml::_('select.option', $message->id, $message->name, $message->category, $message->date, $message->status);
				#$options[] = JHtml::_('select.option', $message->id, $message->greeting . ($message->catid ? ' (' . $message->category . ')' : ''));
				$options[] = JHtml::_('select.option', $message->id, $message->name, $message->date, $message->status . ($message->catid ? ' (' . $message->category . ')' : ''));
			}
		}
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}