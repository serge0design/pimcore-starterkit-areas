<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigTest;
use Pimcore\Model\Asset\Image;

class TwigTests extends AbstractExtension
{

    /**
     * {@inheritdoc}
     */
    function getTests(): array
    {
        return [
            new TwigTest('pimcore_asset_svg', static function ($object) {
                return $object instanceof Image && $object->getMimeType() == "image/svg+xml";
            })
        ];
    }

}
