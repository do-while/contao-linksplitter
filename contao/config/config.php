<?php

declare(strict_types=1);

/**
 * @copyright  Softleister 2013-2026
 * @package    contao-linksplitter
 * @license    LGPL
 * @see	       https://github.com/do-while/contao-linksplitter
 *
 */

use Contao\System;
use Softleister\LinksplitterBundle\ModuleLinkSplitter;
use Softleister\LinksplitterBundle\ContentLinkSplitter;


/**
 * Add beckend style sheet
 *
 */
$request = System::getContainer( )->get( 'request_stack' )->getCurrentRequest( );
$isBackend = $request && System::getContainer( )->get( 'contao.routing.scope_matcher' )->isBackendRequest( $request );

if( $isBackend ) {
    $GLOBALS['TL_CSS'][] = 'bundles/linksplitter/styles.css';
}


/**
 * Content elements
 */
$GLOBALS['TL_CTE']['links']['linksplitter'] = ContentLinkSplitter::class;


/**
 * FRONT END MODULES
 */
$GLOBALS['FE_MOD']['miscellaneous']['linksplitter'] = ModuleLinkSplitter::class;
