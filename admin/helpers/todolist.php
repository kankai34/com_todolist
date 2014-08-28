<?php
// No direct access to this file
defined('_JEXEC') or die;

/**
 * ToDoList component helper.
 */
class ToDoListHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu)
	{
		JHtmlSidebar::addEntry(JText::_('COM_TODOLIST_SUBMENU_TODOLISTS'), 'index.php?option=com_todolist', $submenu == 'todolists');
		JHtmlSidebar::addEntry(JText::_('COM_TODOLIST_SUBMENU_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_todolist', $submenu == 'categories');
		$document = JFactory::getDocument();
		if ($submenu == 'categories')
		{
			$document->setTitle(JText::_('COM_TODOLIST_ADMINISTRATION_CATEGORIES'));
		}
	}
	
	/**
	 * Get the actions
	 */
	public static function getActions($messageId = 0)
	{
		jimport('joomla.access.access');
		$user   = JFactory::getUser();
		$result = new JObject;

		if (empty($messageId)) {
			$assetName = 'com_todolist';
		}
		else {
			$assetName = 'com_todolist.message.'.(int) $messageId;
		}

		$actions = JAccess::getActions('com_todolist', 'component');

		foreach ($actions as $action) {
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}

		return $result;
	}
}