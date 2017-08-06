<?php

/**
 * @copyright  Softleister 2013-2017
 * @author     Softleister <info@softleister.de>
 * @package    contao-linksplitter            äöü
 * @license    LGPL
 * @see        https://github.com/do-while/contao-linksplitter
 *
 */

namespace Softleister\Linksplitter;

/**
 * Class ModuleLinkSplitter
 *
 * @package   Linksplitter
 * @author    Softleister
 * @copyright Softleister  2013-2017
 */
class ModuleLinkSplitter extends \Module
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_linksplitter';


    /**
     * Display a wildcard in the back end
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            $objTemplate = new \BackendTemplate('be_linksplitter');

            $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['linksplitter'][0]) . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;
            $objTemplate->var   = $this->linksplit_var;

            $ziele = deserialize($this->linksplit_destinations);
            for( $i = 0; $i < count($ziele); $i++ ) {
                $ziele[$i]['dest'] = $this->replaceInsertTags($ziele[$i]['dest'], false);
            }
            $objTemplate->ziele = $ziele;

            return $objTemplate->parse();
        }
        return parent::generate();
    }


    /**
     * Generate the module
     */
    protected function compile()
    {
        switch( $this->linksplit_method ) {
            case 'POST':        $value = \Input::post( $this->linksplit_var );
                                break;
            case 'GET':         $value = \Input::get( $this->linksplit_var );
                                break;
            case 'InsertTag':   $value = $this->replaceInsertTags( $this->linksplit_var, false );
                                break;
            default:            $value = '';
        }
        if( $value != '' ) {
            // Get-Parameter übertragen
            $url = \Environment::get('indexFreeRequest');
            if( strpos( $url, '?' ) !== False ) {
                $param = preg_replace( '/^.+\?/', '?', $url );
            }
            else $param = '';

            $ziele = deserialize($this->linksplit_destinations);
            for( $i = 0; $i < count($ziele); $i++ ) {
                $ziel = $this->replaceInsertTags($ziele[$i]['vari'], false);

                if( ($ziel === $value) || ($ziel === '*') ) {
                    $this->redirect( $this->replaceInsertTags($ziele[$i]['dest'], false) . $param );
                }
            }
        }
    }

}
