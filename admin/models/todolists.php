<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * ToDoListList Model
 */
class ToDoListModelToDoLists extends JModelList
{
	public function __construct($config = array())
	{
		$config['filter_fields'] = array(
			'name',
			'catid',
			'date',
			'status',
			'id'
		);
		parent::__construct($config);
	}
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields
		#$query->select('*');
		// From the hello table
		#$query->from('#__todolist');
		$query->select('a.id as id, a.name as name, a.date as date, a.status as status, a.catid as catid, b.title as category');
		$query->from('#__todolist a');
		$query->leftJoin('#__categories b on a.catid = b.id');
        $query->order($db->escape($this->getState('list.ordering', 'default_sort_column')).' '.$db->escape($this->getState('list.direction', 'ASC')));
		return $query;
	}
	
	protected function populateState($ordering = null, $direction = null)
	{
		parent::populateState('name', 'ASC');
	}
}