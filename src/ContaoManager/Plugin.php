<?php

declare(strict_types=1);

/**
 * @copyright  Softleister 2013-2024
 * @package    contao-linksplitter
 * @license    LGPL
 * @see	       https://github.com/do-while/contao-linksplitter
 *
 */

namespace Softleister\LinksplitterBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Softleister\LinksplitterBundle\LinksplitterBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use MenAtWork\MultiColumnWizardBundle\Contao\Widgets\MultiColumnWizard;


class Plugin implements BundlePluginInterface
{
    public function getBundles( ParserInterface $parser )
    {
        return [
            BundleConfig::create( LinksplitterBundle::class )
                ->setLoadAfter( [ContaoCoreBundle::class, MultiColumnWizard::class] )
                ->setReplace( ['linksplitter'] ),
        ];
    }
}
