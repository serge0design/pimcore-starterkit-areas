<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Test extends AbstractAreabrick
{

    public function getLeftCol(): array
    {
        return [
        ];
    }

    public function getRightCol(): array
    {
        return [
        ];
    }


}
