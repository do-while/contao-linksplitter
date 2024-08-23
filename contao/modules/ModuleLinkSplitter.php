<?php

declare(strict_types=1);

/**
 * @copyright  Softleister 2013-2024
 * @package    contao-linksplitter
 * @license    LGPL
 * @see	       https://github.com/do-while/contao-linksplitter
 *
 */

namespace Softleister\LinksplitterBundle;

use Contao\Input;
use Contao\Module;
use Contao\System;
use Contao\StringUtil;
use Contao\Environment;
use Contao\BackendTemplate;
use Contao\CoreBundle\Util\UrlUtil;


class ModuleLinkSplitter extends Module
{
    protected $strTemplate = 'mod_linksplitter';


    public function generate( )
    {
        $container = System::getContainer( );
        $request = $container->get( 'request_stack' )->getCurrentRequest( );

        if( $request && $container->get( 'contao.routing.scope_matcher' )->isBackendRequest( $request ) ) {
            $objTemplate = new BackendTemplate( 'be_linksplitter' );

            $objTemplate->wildcard = '### ' . mb_strtoupper( $GLOBALS['TL_LANG']['FMD']['linksplitter'][0] ) . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;
            $objTemplate->var   = $this->linksplit_var;

            $ziele = StringUtil::deserialize( $this->linksplit_destinations );
            for( $i = 0; $i < count( $ziele ); $i++ ) {
                $ziele[$i]['dest'] = System::getContainer( )->get( 'contao.insert_tag.parser' )->replaceInline( $ziele[$i]['dest'] );
            }
            $objTemplate->ziele = $ziele;

            return $objTemplate->parse( );
        }
        return parent::generate( );
    }


    protected function compile( )
    {
        switch( $this->linksplit_method ) {
            case 'POST':        $value = Input::post( $this->linksplit_var );
                                break;
            case 'GET':         $value = Input::get( $this->linksplit_var );
                                break;
            case 'InsertTag':   $value = System::getContainer( )->get( 'contao.insert_tag.parser' )->replaceInline( $this->linksplit_var );
                                break;
            case 'COOKIE':      $value = Input::cookie( $this->linksplit_var );
                                break;
            case 'REQUEST':     $value = Input::post( $this->linksplit_var );
                                if( $value == '' ) {
                                    $value = Input::get( $this->linksplit_var );
                                }
                                break;
            default:            $value = '';
        }
        if( $value != '' ) {
            // Get-Parameter übertragen
            $url = Environment::get( 'indexFreeRequest' );
            if( strpos( $url, '?' ) !== False ) {
                $param = preg_replace( '/^.+\?/', '?', $url );
            }
            else $param = '';

            $ziele = StringUtil::deserialize( $this->linksplit_destinations );
            for( $i = 0; $i < count( $ziele ); $i++ ) {
                $ziel = System::getContainer( )->get( 'contao.insert_tag.parser' )->replaceInline( $ziele[$i]['vari'] );

                if( ( $ziel === $value ) || ( $ziel === '*' ) ) {
                    $url = System::getContainer( )->get( 'contao.insert_tag.parser' )->replaceInline( $ziele[$i]['dest'] );
                    $url = UrlUtil::makeAbsolute( $url, Environment::get( 'base' ) );

                    $this->redirect( $url . $param );
                }
            }
        }
    }
}
