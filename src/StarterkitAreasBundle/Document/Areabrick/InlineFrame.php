<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class InlineFrame extends AbstractAreabrick
{
    /**
     * {@inheritdoc}
     */
    public function action(Info $info): ?Response
    {
        return parent::action($info);
    }

    /**
     * {@inheritdoc}
     */
    public function getLeftCol(): array
    {
        return [ ];
    }

    /**
     * {@inheritdoc}
     */
    public function getRightCol(): array
    {
        return [];
    }
}
