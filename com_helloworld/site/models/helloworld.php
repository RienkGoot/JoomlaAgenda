<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * HelloWorld Model
 */
class HelloWorldModelHelloWorld extends JModelItem
{
    /**
     * Method to build an SQL query to load the list data.
     * @return      string  An SQL query
     */
    public function getListQuery()
    {
        // Create a new query object.
        $db    = JFactory::getDBO();
        $query = $db->getQuery(true);
        // Select some fields
        $query->select('*');
        // From the hello table
        $query->from('#__events');

        return $query;
    }
}