<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Video extends AbstractAreabrick
{
    public function getLeftCol()
    {
        return [
            [
                'type' => 'select',
                'name' => 'selectVideoRatio',
                'label' => $this->translationString('selectVideoRatio'),
                'config' => [
                    'store' => [
                        ['-4x3', $this->translationString('4x3')],
                        ['-16x9', $this->translationString('16x9')],
                        ['-21x9', $this->translationString('21x9')],
                    ],
                    'defaultValue' => '-16x9',
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxEnableLightbox',
                'label' => $this->translationString('checkboxEnableLightbox'),
                'config' => [
                    'reload' => true,
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxDisplayCaption',
                'label' => $this->translationString('checkboxDisplayCaption'),
            ],
        ];
    }


    public function getRightCol()
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
                'name' => 'checkboxDisableControls',
                'label' => $this->translationString('checkboxDisableControls'),
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxEnableAutoplay',
                'label' => $this->translationString('checkboxEnableAutoplay'),
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxEnableLoop',
                'label' => $this->translationString('checkboxEnableLoop'),
            ],
        ];
    }


}
