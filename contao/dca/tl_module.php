<?php

declare(strict_types=1);

/**
 * @copyright  Softleister 2013-2024
 * @package    contao-linksplitter
 * @license    LGPL
 * @see	       https://github.com/do-while/contao-linksplitter
 *
 */


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['linksplitter'] = '{title_legend},name,type;{split_legend},linksplit_method,linksplit_var;{destination_legend},linksplit_destinations;{protected_legend:hide},protected;{expert_legend:hide},guests';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['linksplit_method'] = [
    'default'       => 'GET',
    'inputType'     => 'select',
    'options'       => ['POST', 'GET', 'InsertTag', 'COOKIE', 'REQUEST'],
    'eval'          => ['tl_class' => 'w50'],
    'sql'           => ['type' => 'string', 'length' => 12, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_module']['fields']['linksplit_var'] = [
    'inputType'     => 'text',
    'eval'          => ['mandatory'=>true, 'maxlength'=>64, 'decodeEntities'=>true, 'tl_class'=>'w50'],
    'sql'           => ['type' => 'string', 'length' => 64, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_module']['fields']['linksplit_destinations'] = [
    'inputType'     => 'multiColumnWizard',
    'eval'          => [
                            'columnFields' => [
                                'vari' => [
                                    'label'         => &$GLOBALS['TL_LANG']['tl_module']['linksplit_vari'],
                                    'exclude'       => true,
                                    'inputType'     => 'text',
                                    'eval'          => ['style' => 'width:100px']
                                ],
                                'dest' => [
                                    'label'         => &$GLOBALS['TL_LANG']['tl_module']['linksplit_dest'],
                                    'exclude'       => true,
                                    'inputType'     => 'text',
                                    'eval'          => ['mandatory' => true, 'rgxp' => 'url', 'decodeEntities' => true, 'maxlength' => 255, 'dcaPicker' => true, 'addWizardClass' => false, 'style' => 'width:400px'],
                                ],
                            ],
                        ],
    'sql'           => "blob NULL"
];
