<?php

/**
 * @copyright  Softleister 2013-2022
 * @author     Softleister <info@softleister.de>
 * @package    contao-linksplitter
 * @license    LGPL
 * @see	       https://github.com/do-while/contao-linksplitter
 *
 */

namespace Softleister\LinksplitterBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;


/**
 * Plugin for the Contao Manager.
 *
 * @author Softleister
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles( ParserInterface $parser )
    {
        return [
            BundleConfig::create( 'Softleister\LinksplitterBundle\SoftleisterLinksplitterBundle' )
                ->setLoadAfter( ['Contao\CoreBundle\ContaoCoreBundle', 'MenAtWork\MultiColumnWizard'] )
                ->setReplace( ['linksplitter'] ),
        ];
    }
}
