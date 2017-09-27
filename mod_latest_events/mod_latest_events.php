<?php

// No direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

// Load custom module css
$doc=JFactory::getDocument();
$doc->addStyleSheet(JUri::root().'/modules/mod_latest_events/css/latest_events.css');

// Use bootstrap javascript framework
JHtml::_('bootstrap.framework');

require JModuleHelper::getLayoutPath('mod_latest_events');