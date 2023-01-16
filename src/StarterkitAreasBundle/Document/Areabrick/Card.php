<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Card extends AbstractAreabrick
{

    public function getLeftCol(): array
    {
        return [
            [
                'type' => 'select',
                'name' => 'selectCardType',
                'label' => $this->translationString('selectCardType'),
                'config' => [
                    'store' => $this->getStore('cardType'),
                    'defaultValue' => 'default',
                    'reload' => true,
                ]
            ],
            [
                'type' => 'input',
                'name' => 'inputId',
                'label' => $this->translationString('inputId'),
                'config' => [
                    'reload' => true,
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxReverseRowHeader',
                'label' => $this->translationString('checkboxReverseRowHeaderLabel'),
                'config' => [
                    'reload' => true,
                ]
            ],
        ];
    }

    public function getRightCol(Document\Editable $area): array
    {
        $cardType = $this->getEditableData($area, 'select', 'selectCardType');
        return ($cardType === 'object' ? [
            [
                'type' => 'relation',
                'name' => 'relationCardObject',
                'label' => $this->translationString('relationCardObject'),
                'config' => [
                    'reload' => false,
                    "types" => ["object"],
                    "subtypes" => [
                        "object" => ["object"],
                    ]
                ]
            ]
        ] : []);
    }
}
