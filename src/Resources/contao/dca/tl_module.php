<?php

/**
 * @copyright  Softleister 2013-2020
 * @author     Softleister <info@softleister.de>
 * @package    contao-linksplitter
 * @license    LGPL
 * @see        https://github.com/do-while/contao-linksplitter
 *
 */

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['linksplitter'] = '{title_legend},name,type;{split_legend},linksplit_method,linksplit_var;{destination_legend},linksplit_destinations;{protected_legend:hide},protected;{expert_legend:hide},guests';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['linksplit_method'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['linksplit_method'],
    'default'                 => 'GET',
    'exclude'                 => true,
    'inputType'               => 'select',
    'options'                 => array('POST', 'GET', 'InsertTag', 'COOKIE', 'REQUEST'),
    'eval'                    => array('tl_class'=>'w50'),
    'sql'                     => "varchar(12) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['linksplit_var'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['linksplit_var'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'maxlength'=>64, 'decodeEntities'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['linksplit_destinations'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['linksplit_destinations'],
    'exclude'                 => true,
    'inputType'               => 'multiColumnWizard',
    'eval'                    => array (
                                    'columnFields' => array (
                                        'vari' => array (
                                            'label'         => &$GLOBALS['TL_LANG']['tl_module']['linksplit_vari'],
                                            'exclude'       => true,
                                            'inputType'     => 'text',
                                            'eval'          => array('style'=>'width:100px')
                                        ),
                                        'dest' => array (
                                            'label'         => &$GLOBALS['TL_LANG']['tl_module']['linksplit_dest'],
                                            'exclude'       => true,
                                            'inputType'     => 'text',
                                            'eval'          => array('mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'dcaPicker'=>true, 'addWizardClass'=>false, 'style'=>'width:400px'),
                                        ),
                                    )
                                 ),
    'sql'                     => "blob NULL"
);

