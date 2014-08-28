<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * ToDoLists View
 */
class ToDoListViewToDoLists extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
	protected $canDo;

	/**
	 * ToDoLists view display method
	 *
	 * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 */
	function display($tpl = null)
	{
		// Get data from the model
		$items      = $this->get('Items');
        $state      = $this->get('State');
		$pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Assign data to the view
		$this->items		= $items;
		$this->state		= $state;
		$this->pagination	= $pagination;

		// Load helper
		$this->loadHelper('todolist');

		// What Access Permissions does this user have? What can (s)he do?
		$this->canDo = ToDoListHelper::getActions();

		// Set the toolbar
		$this->addToolBar();
		
		// Set the submenu
		ToDoListHelper::addSubmenu('todolists');
		
		// Set the sidebar
		#$this->addSidebar('messages');

		// Set table sortable columns
		$this->sortDirection = $state->get('list.direction');
		$this->sortColumn = $state->get('list.ordering');

		// Set the sidebar
		$this->sidebar = JHtmlSidebar::render();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar()
	{
	   JToolBarHelper::title(JText::_('COM_TODOLIST_MANAGER_TODOLISTS'), 'todolist');
		if ($this->canDo->get('core.create')) 
		{
			JToolBarHelper::addNew('todolist.add', 'JTOOLBAR_NEW');
		}
		if ($this->canDo->get('core.edit')) 
		{
			JToolBarHelper::editList('todolist.edit', 'JTOOLBAR_EDIT');
		}
		if ($this->canDo->get('core.delete')) 
		{
			JToolBarHelper::deleteList('', 'todolists.delete', 'JTOOLBAR_DELETE');
		}
		if ($this->canDo->get('core.admin')) 
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_todolist');
		}
	}
	
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_TODOLIST_ADMINISTRATION'));
	}
}