<?php

/**
 * @copyright  Softleister 2013-2022
 * @author     Softleister <info@softleister.de>
 * @package    contao-linksplitter
 * @license    LGPL
 * @see        https://github.com/do-while/contao-linksplitter
 *
 */

namespace Softleister\Linksplitter;

use Contao\Module;
use Contao\BackendTemplate;
use Contao\StringUtil;
use Contao\Input;
use Contao\Environment;
use Contao\Controller;

/**
 * Class ModuleLinkSplitter
 *
 * @package   Linksplitter
 * @author    Softleister
 * @copyright Softleister  2013-2017
 */
class ModuleLinkSplitter extends Module
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
            $objTemplate = new BackendTemplate('be_linksplitter');

            $objTemplate->wildcard = '### ' . mb_strtoupper($GLOBALS['TL_LANG']['FMD']['linksplitter'][0]) . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;
            $objTemplate->var   = $this->linksplit_var;

            $ziele = StringUtil::deserialize($this->linksplit_destinations);
            for( $i = 0; $i < count($ziele); $i++ ) {
                $ziele[$i]['dest'] = Controller::replaceInsertTags($ziele[$i]['dest'], false);
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
            case 'POST':        $value = Input::post( $this->linksplit_var );
                                break;
            case 'GET':         $value = Input::get( $this->linksplit_var );
                                break;
            case 'InsertTag':   $value = Controller::replaceInsertTags( $this->linksplit_var, false );
                                break;
            case 'COOKIE':      $value = Input::cookie( $this->linksplit_var );
                                break;
            case 'REQUEST':     $value = Input::post( $this->linksplit_var );
                                if( $value =='' )
                                    $value = Input::get( $this->linksplit_var );
                                break;
            default:            $value = '';
        }
        if( $value != '' ) {
            // Get-Parameter übertragen
            $url = Environment::get('indexFreeRequest');
            if( strpos( $url, '?' ) !== False ) {
                $param = preg_replace( '/^.+\?/', '?', $url );
            }
            else $param = '';

            $ziele = StringUtil::deserialize($this->linksplit_destinations);
            for( $i = 0; $i < count($ziele); $i++ ) {
                $ziel = Controller::replaceInsertTags($ziele[$i]['vari'], false);

                if( ($ziel === $value) || ($ziel === '*') ) {
                    $this->redirect( Controller::replaceInsertTags($ziele[$i]['dest'], false) . $param );
                }
            }
        }
    }

}
