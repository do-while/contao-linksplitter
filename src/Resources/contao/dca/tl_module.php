<?php

/**
 * @copyright  Softleister 2013-2017
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
    'options'                 => array('POST', 'GET', 'InsertTag'),
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
                                            'eval'          => array('mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'fieldType'=>'radio', 'tl_class'=>'w50 wizard'),
                                            'wizard'        => array( array('tl_module_linksplit', 'pagePicker') ),
                                        ),
                                    )
                                 ),
    'sql'                     => "blob NULL"
);


/**
 * Class tl_module_linksplit
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @package   Linksplitter
 * @author    Softleister
 * @copyright Softleister  2013-2017
 */
class tl_module_linksplit extends Backend
{

    /**
     * Import the back end user object
     */
    public function __construct()
    {
        parent::__construct();
        $this->import('BackendUser', 'User');
    }


    /**
     * Return the link picker wizard
     * @param \DataContainer
     * @return string
     */
    public function pagePicker(DataContainer $dc)
    {
        return ' <a href="contao/page.php?do=' . Input::get('do') . '&amp;table=' . $dc->table . '&amp;field=' . $dc->field . '&amp;value=' . str_replace(array('{{link_url::', '}}'), '', $dc->value) . '" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\'' . specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MOD']['page'][0])) . '\',\'url\':this.href,\'id\':\'' . $dc->field . '\',\'tag\':\'ctrl_'. $dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '') . '\',\'self\':this});return false">' . Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
    }

}
