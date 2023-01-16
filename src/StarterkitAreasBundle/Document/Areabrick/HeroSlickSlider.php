<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class HeroSlickSlider extends AbstractAreabrick
{

    public function getLeftCol(): array
    {
        return [
            [
                'type' => 'relation',
                'name' => 'relationObjectSliderFolder',
                'label' => $this->translationString('relationObjectSliderFolder', [], 'admin'),
                'config' => [
                    'reload' => true,
                    "types" => ["object"],
                    "subtypes" => [
                        "object" => ["folder"],
                    ]
                ]
            ],
        ];
    }

    public function getRightCol(): array
    {
        return [
            [
                'type' => 'checkbox',
                'name' => 'checkboxHideArrows',
                'label' => $this->translationString('checkboxHideArrows', [], 'admin'),
                'config' => [
                    'reload' => true,
                ],
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxHideDots',
                'label' => $this->translationString('checkboxHideDots', [], 'admin'),
                'config' => [
                    'reload' => true,
                ],
            ]
        ];
    }
}
