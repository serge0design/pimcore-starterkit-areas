<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Gallery extends AbstractAreabrick
{
    public function getLeftCol(): array
    {
        return [
            ['type' => 'select',
                'name' => 'selectGalleryType',
                'label' => $this->translationString('selectGalleryType'),
                'config' => [
                    'store' => [
                        ['folder', 'Folder'],
                        ['listing', 'Listing']
                    ],
                    'defaultValue' => 'folder',
                    'reload' => true,
                ]
            ],
            ['type' => 'select',
                'name' => 'selectRowClassType',
                'label' => $this->translationString('selectRowClassType'),
                'config' => [
                    'store' => $this->getStore('rowClassType'),
                    'defaultValue' => 'default',
                    'reload' => false,
                ]
            ],
            ['type' => 'select',
                'name' => 'selectImageRatio',
                'label' => $this->translationString('selectImageRatio'),
                'config' => [
                    'store' => $this->getStore('imageRatio'),
                    'defaultValue' => '4x5-cover',
                    'reload' => false,
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxDisplayCaption',
                'label' => $this->translationString('checkboxDisplayCaption'),
                'config' => [
                    'reload' => true
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxEnableLightbox',
                'label' => 'Enable Lightbox?',
                'config' => [
                    'reload' => true
                ]
            ]
        ];
    }

    public function getRightCol(Document\Editable $area): array
    {
        $selectGalleryType = $this->getEditableData($area, 'select', 'selectGalleryType');
        return [
            [
                'type' => 'simple_output',
                'name' => 'Info',
                'config' => [
                    'class' => 'alert alert-dark',
                    'value' => $this->translationString('strInfo'),
                ]
            ],

            ($selectGalleryType == null || $selectGalleryType == "folder" ? [
                'type' => 'relation',
                'name' => 'relationGalleryFolder',
                'label' => $this->translationString('relationGalleryFolder'),
                'config' => [
                    'types' => ["asset"],
                    'subtypes' => [
                        "asset" => ["folder"],
                    ],
                    'reload' => true
                ]
            ] : []),

            ($selectGalleryType == "listing" ? [
                'type' => 'relations',
                'name' => 'relationsGalleryItems',
                'label' => $this->translationString('relationsGalleryItems'),
                'config' => [
                    'types' => ["asset"],
                    'subtypes' => [
                        "asset" => ["image", "folder"],
                    ]
                ]
            ] : [])
        ];
    }
}
