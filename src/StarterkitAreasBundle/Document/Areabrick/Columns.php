<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Columns extends AbstractAreabrick
{
    /**
     * {@inheritdoc}
     */
    public function getLeftCol(): array
    {
        return [
            [
                'type' => 'select',
                'name' => 'selectRowClass',
                'label' => $this->translationString('selectRowClass'),
                'config' => [
                    'store' => $this->getStore('rowClass'),
                    'defaultValue' => 'default',
                    'reload' => true,
                ]
            ],
            [
                'type' => 'select',
                'name' => 'selectColumnType',
                'label' => $this->translationString('selectColumnType'),
                'config' => [
                    'store' => $this->getStore('columnsType'),
                    'defaultValue' => 'default',
                    'reload' => true,
                ]
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getRightCol(): array
    {
        return [];
    }
}
