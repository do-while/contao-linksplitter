<?php

declare(strict_types=1);

/**
 * @copyright  Softleister 2013-2026
 * @package    contao-linksplitter
 * @license    LGPL
 * @see	       https://github.com/do-while/contao-linksplitter
 *
 */

$GLOBALS['TL_LANG']['tl_content']['linksplit_method']       = ['Variable type', 'The control variable may be a GET from URL parameter or POST from a submitted form or an insert tag.'];
$GLOBALS['TL_LANG']['tl_content']['linksplit_var']          = ['Control variable', 'Control variable, e.g. <strong>act</strong> at URL parameter <strong>?act=edit</strong> or <strong>{{user::username}}</strong> at InsertTags'];
$GLOBALS['TL_LANG']['tl_content']['linksplit_destinations'] = ['forwarding destinations', 'Defines the destinations for the different variable values. Nonexistent values are not redirected. * only checks for the presence of the variable.'];

$GLOBALS['TL_LANG']['tl_content']['linksplit_vari']         = 'Variable value';
$GLOBALS['TL_LANG']['tl_content']['linksplit_dest']         = 'Destination URL';


$GLOBALS['TL_LANG']['tl_content']['split_legend']        = 'Splitter control';
$GLOBALS['TL_LANG']['tl_content']['destination_legend']  = 'Forwarding destinations';
