<?php
/**
 * @package     com_type
 * @author      Rienk
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * View class, pass the types to view and add a toolbar if user is authorised.
 *
 * @subpackage  View
 * @since       1.0
 */
class TypeViewTypes extends JViewLegacy
{
    /**
     * Types view display method
     * @param string $tpl The name of the template file to parse; automatically searches through the template paths.
     * @return bool A string if successful, otherwise a JError object.
     * @since 1.0
     */
    function display($tpl = null)
    {
        // Options button.
        if (JFactory::getUser()->authorise('core.admin', 'com_type'))
        {
            JToolBarHelper::preferences('com_type');
        }

        // Get application
        $app = JFactory::getApplication();
        $context = "type.list.admin.type";

        // Get data from the model
        $items      = $this->get('Items');
        $pagination = $this->get('Pagination');
        $this->state			= $this->get('State');
        $this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'title', 'cmd');
        $this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
        $this->filterForm    	= $this->get('FilterForm');
        $this->activeFilters 	= $this->get('ActiveFilters');

        // What Access Permissions does this user have? What can (s)he do?
        $this->canDo = JHelperContent::getActions('com_type');

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }

        // Assign data to the view
        $this->items      = $items;
        $this->pagination = $pagination;

        // Set the toolbar and number of found items
        $this->addToolBar();

        // Display the template
        parent::display($tpl);

        // Set the document
        $this->setDocument();
    }

    /**
     * Setting the toolbar
     * @since 1.0
     */
    protected function addToolBar()
    {
        $title = JText::_('Evenement types beheren');

        if ($this->pagination->total)
        {
            $title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
        }

        JToolBarHelper::title(JText::_('Evenement types beheren'), 'tags-2');

        // Create Type if authorised
        if (JFactory::getUser()->authorise('core.create', 'com_type'))
        {
            JToolBarHelper::addNew('type.add');
        }

        // Edit Type if authorised
        if (JFactory::getUser()->authorise('core.edit', 'com_type'))
        {
        JToolBarHelper::editList('type.edit');
        }

        // Delete Type if authorised
        if (JFactory::getUser()->authorise('core.delete', 'com_type'))
        {
            JToolBarHelper::deleteList('', 'types.delete');
        }
    }

    /**
     * Method to set up the document properties
     * @return void
     * @since 1.0
     */
    protected function setDocument()
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('Evenementen beheer'));
    }
}