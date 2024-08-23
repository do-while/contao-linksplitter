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

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LinksplitterBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
