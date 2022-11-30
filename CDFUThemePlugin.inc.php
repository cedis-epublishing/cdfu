<?php

/**
 * @file plugins/themes/default/DefaultChildThemePlugin.inc.php
 *
 * Copyright (c) 2014-2016 Simon Fraser University Library
 * Copyright (c) 2003-2016 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class DefaultChildThemePlugin
 * @ingroup plugins_themes_default
 *
 * @brief Default theme
 */
import('lib.pkp.classes.plugins.ThemePlugin');

class CDFUThemePlugin extends ThemePlugin {
	/**
	 * Initialize the theme's styles, scripts and hooks. This is only run for
	 * the currently active theme.
	 *
	 * @return null
	 */
	public function init() {

		// Initialize the parent theme
		$this->setParent('defaultthemeplugin');

		// Remove options of the parent theme
		$this->removeOption('baseColour');
		$this->removeOption('typography');

		// Add custom styles
		$this->modifyStyle('stylesheet', array('addLess' => array('styles/cdfu.less')));
		//$this->modifyStyle('stylesheet', array('addLess' => array('styles/cdfu.less')));
		//$this->addStyle('cdfu', 'styles/cdfu.less');
		
		$additionalLessVariables = array();		
		$additionalLessVariables[] = '@text-bg-base: #333;';
		$additionalLessVariables[] = '@bg-base:: #fff;';	
		$additionalLessVariables[] = '@primary: #06c;';
		$additionalLessVariables[] = '@primary-lift: #06c;';		
		if (!empty($additionalLessVariables)) {
			$this->modifyStyle('stylesheet', array('addLessVariables' => join('', $additionalLessVariables)));
		}
	}

	/**
	 * Get the display name of this plugin
	 * @return string
	 */
	function getDisplayName() {
		return __('plugins.themes.cdfu.name');
	}

	/**
	 * Get the description of this plugin
	 * @return string
	 */
	function getDescription() {
		return __('plugins.themes.cdfu.description');
	}
}

?>
