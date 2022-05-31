<?php

/**
 * @copyright  Softleister 2013-2022
 * @author     Softleister <info@softleister.de>
 * @package    contao-linksplitter
 * @license    LGPL
 * @see	       https://github.com/do-while/contao-linksplitter
 *
 */


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
