<?php

/**
 * @copyright  Softleister 2013-2017
 * @author     Softleister <info@softleister.de>
 * @package    contao-linksplitter
 * @license    LGPL
 * @see	       https://github.com/do-while/contao-linksplitter
 *
 */

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module']['linksplit_method']       = array('Variable type', 'The control variable may be a GET from URL parameter or POST from a submitted form or an insert tag.');
$GLOBALS['TL_LANG']['tl_module']['linksplit_var']          = array('Control variable', 'Control variable, e.g. <strong>act</strong> at URL parameter <strong>?act=edit</strong> or <strong>{{user::username}}</strong> at InsertTags');
$GLOBALS['TL_LANG']['tl_module']['linksplit_destinations'] = array('forwarding destinations', 'Defines the destinations for the different variable values. Nonexistent values are not redirected. * only checks for the presence of the variable.');

$GLOBALS['TL_LANG']['tl_module']['linksplit_vari']         = 'Variable value';
$GLOBALS['TL_LANG']['tl_module']['linksplit_dest']         = 'Destination URL';


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_module']['split_legend']        = 'Splitter control';
$GLOBALS['TL_LANG']['tl_module']['destination_legend']  = 'Forwarding destinations';

