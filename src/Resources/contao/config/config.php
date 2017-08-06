<?php

/**
 * @copyright  Softleister 2013-2017
 * @author     Softleister <info@softleister.de>
 * @package    contao-linksplitter
 * @license    LGPL
 * @see	       https://github.com/do-while/contao-linksplitter
 *
 */

define('LINKSPLITTER_VERSION', '1.0');
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

