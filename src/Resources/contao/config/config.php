<?php

/**
 * @copyright  Softleister 2013-2020
 * @author     Softleister <info@softleister.de>
 * @package    contao-linksplitter
 * @license    LGPL
 * @see	       https://github.com/do-while/contao-linksplitter
 *
 */

define('LINKSPLITTER_VERSION', '1.1');
define('LINKSPLITTER_BUILD'  , '0');

/*
 * Frontend Module
 */
array_insert($GLOBALS['FE_MOD'], -1, array
(
	'miscellaneous' => array
	(
		'linksplitter'    => 'Softleister\Linksplitter\ModuleLinkSplitter'
	)
));

