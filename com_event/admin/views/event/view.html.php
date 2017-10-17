<?php
/**
 * @package     com_event
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
 * View class, Pass the events to view and add a toolbar with document properties.
 *
 * @subpackage  View
 * @since       1.0
 */
class EventViewEvent extends JViewLegacy
{
    /**
     * Event view display method
     * @param string $tpl The name of the template file to parse; automatically searches through the template paths.
     * @return bool A string if successful, otherwise a JError object.
     * @since 1.1
     */
	public function display($tpl = null)
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}

		// Assign the Data
		$this->form = $form;
		$this->item = $item;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

        // Set the document
        $this->setDocument();
	}

    /**
     * Setting the toolbar
     * @since 1.6
     */
	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;
		$input->set('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title($isNew ? JText::_('Nieuw evenement') : JText::_('Evenement bijwerken'),'apply');
		JToolBarHelper::save('event.save');
		JToolBarHelper::cancel('event.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}

    /**
     * Method to set up the document properties
     * @return void
     * @since 1.6
     */
    protected function setDocument()
    {
        $isNew = ($this->item->id < 1);
        $document = JFactory::getDocument();
        $document->setTitle($isNew ? JText::_('Evenement aanmaken') :
            JText::_('Evenement bijwerken'));
    }
}