<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Cards extends AbstractAreabrick
{
    public function getLeftCol(): array
    {
        return [
            [
                'type' => 'select',
                'name' => 'selectCardsType',
                'label' => $this->translationString('selectCardsType'),
                'config' => [
                    'store' => $this->getStore('cardsType'),
                    'defaultValue' => 'default',
                    'reload' => true,
                ]
            ],
            [
                'type' => 'select',
                'name' => 'selectCssClassRow',
                'label' => $this->translationString('selectCssClassRow'),
                'config' => [
                    'store' => $this->getStore('cssClassRow'),
                    'defaultValue' => 'default',
                    'reload' => true,
                ]
            ]
        ];
    }

    public function getRightCol(Document\Editable $area): array
    {
        $cardsType = $this->getEditableData($area, 'select', 'selectCardsType');
        return ($cardsType === 'object' ? [
            [
                'type' => 'relation',
                'name' => 'relationCardsObject',
                'label' => $this->translationString('relationCardsObject'),
                'config' => [
                    'reload' => true,
                    "types" => ["object"],
                    "subtypes" => [
                        "object" => ["folder"],
                    ]
                ]
            ]
        ] : []);
    }
}
