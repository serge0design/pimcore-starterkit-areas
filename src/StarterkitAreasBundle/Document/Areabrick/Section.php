<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Section extends AbstractAreabrick
{

    public function getLeftCol(): array
    {
        return [
            [
                'type' => 'select',
                'name' => 'selectSectionBgType',
                'label' => $this->translationString('selectSectionBgType'),
                'config' => [
                    'store' => $this->getStore('sectionBgType'),
                    'defaultValue' => 'default',
                    'reload' => true,
                ]
            ],
            [
                'type' => 'select',
                'name' => 'selectSectionAttrType',
                'label' => $this->translationString('selectSectionAttrType'),
                'config' => [
                    'store' => $this->getStore('sectionAttrType'),
                    'defaultValue' => 'default',
                    'reload' => true,
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxContainerType',
                'label' => $this->translationString('checkboxContainerType'),
                'config' => [
                    'reload' => true,
                ]
            ], [
                'type' => 'input',
                'name' => 'inputAnchorName',
                'label' => $this->translationString('inputAnchorName'),
                'config' => [
                    'reload' => true,
                ]
            ]
        ];
    }

    public function getRightCol(Document\Editable $area): array
    {
        $sectionType = $this->getEditableData($area, 'select', 'selectSectionType');

        return ($sectionType === 'bgcolor' ? [
            [
                'type' => 'color_picker',
                'name' => 'colorPickerSectionBgColor',
                'label' => $this->translationString('colorPickerSectionBgColor'),
            ]
        ] : ($sectionType === 'bgimage' ? [
            [
                'type' => 'image',
                'name' => 'imageSectionBgImage',
                'label' => $this->translationString('sectionBgImage'),
                'config' => [
                    'thumbnail' => 'ratio-16x9-contain',
                    'height' => 360
                ]
            ],
        ] : []));
    }

    public function getHtmlTagOpen(Info $info): string
    {
        return '';
    }

    public function getHtmlTagClose(Info $info): string
    {
        return '';
    }

}
