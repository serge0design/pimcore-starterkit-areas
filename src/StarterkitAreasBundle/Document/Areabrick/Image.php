<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Image extends AbstractAreabrick
{

    public function getLeftCol(): array
    {
        return [
            [
                'type' => 'select',
                'name' => 'selectImageRatio',
                'label' => $this->translationString('selectImageRatio'),
                'config' => [
                    'store' => [
                        ['-1x1', $this->translationString('1x1')],
                        ['-3x2', $this->translationString('3x2')],
                        ['-4x3', $this->translationString('4x3')],
                        ['-4x5', $this->translationString('4x5')],
                        ['-16x9', $this->translationString('16x9')],
                        ['-21x9', $this->translationString('21x9')],
                    ],
                    'defaultValue' => '-3x2',
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxDisplayCaption',
                'label' => $this->translationString('checkboxDisplayCaption'),
            ],
        ];
    }

    public function getRightCol(): array
    {
        return [
            [
                'type' => 'simple_output',
                'name' => 'Info',
                'config' => [
                    'class' => 'alert alert-dark',
                    'value' => $this->translationString('strInfo'),
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxEnableLightbox',
                'label' => $this->translationString('checkboxEnableLightbox'),
                'config' => [
                    'reload' => true,
                ]
            ]
        ];
    }


}
