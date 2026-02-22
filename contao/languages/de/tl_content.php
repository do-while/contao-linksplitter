<?php

declare(strict_types=1);

/**
 * @copyright  Softleister 2013-2026
 * @package    contao-linksplitter
 * @license    LGPL
 * @see	       https://github.com/do-while/contao-linksplitter
 *
 */

$GLOBALS['TL_LANG']['tl_content']['linksplit_method']       = ['Variablentyp', 'Die Steuervariable kann vom Typ GET aus den URL-Paramtern oder als POST aus einem Formular oder InsertTags verwendet werden.'];
$GLOBALS['TL_LANG']['tl_content']['linksplit_var']          = ['Variablenname', 'Steuervariable, z.B. <strong>act</strong> bei URL-Paramter <strong>?act=edit</strong> oder <strong>{{user::username}}</strong> bei InsertTags'];
$GLOBALS['TL_LANG']['tl_content']['linksplit_destinations'] = ['Umleitungsziele', 'Definiert die Ziele für die verschiedenen Variablenwerte. Nicht vorhandene Werte werden nicht umgelenkt. * prüft nur auf Vorhandensein der Variablen'];

$GLOBALS['TL_LANG']['tl_content']['linksplit_vari']         = 'Variablenwert';
$GLOBALS['TL_LANG']['tl_content']['linksplit_dest']         = 'Ziel-URL';


$GLOBALS['TL_LANG']['tl_content']['split_legend']        = 'Splittersteuerung';
$GLOBALS['TL_LANG']['tl_content']['destination_legend']  = 'Umleitungsziele';
