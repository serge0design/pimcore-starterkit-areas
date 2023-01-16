<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Divider extends AbstractAreabrick
{
    /**
     * {@inheritdoc}
     */
    public function getLeftCol(): array
    {
        return [
            [
                'type' => 'select',
                'name' => 'selectDividerClass',
                'label' => $this->translationString('selectDividerClass', [], 'admin'),
                'config' => [
                    'store' => $this->getStore('dividerClass'),
                    'defaultValue' => 'default',
                    'reload' => true,
                ]
            ],
            [
                'type' => 'select',
                'name' => 'selectWidthClass',
                'label' => $this->translationString('selectWidthClass', [], 'admin'),
                'config' => [
                    'store' => $this->getStore('widthClass'),
                    'defaultValue' => 'w100',
                ]
            ],
            [
                'type' => 'select',
                'name' => 'selectSpacersizeClass',
                'label' => $this->translationString('selectSpacersizeClass', [], 'admin'),
                'config' => [
                    'store' => $this->getStore('spacersizeClass'),
                    'defaultValue' => 'x1',
                ]
            ]
        ];
    }


    public function getRightCol(Document\Editable $area): array
    {
        $selectDividerClass = $this->getEditableData($area, 'select', 'selectDividerClass');

        return [
            (($selectDividerClass == 'divider-bg-img') ? [
                'type' => 'checkbox',
                'name' => 'checkboxDividerImgRepeat',
                'label' => $this->translationString('checkboxDividerImgRepeat'),
            ] : []),
            (($selectDividerClass == 'divider-bg-img') ? [
                'type' => 'image',
                'name' => 'imageDividerImg',
                'label' => $this->translationString('imageDividerImg'),
                'thumbnail' => 'dividerBgImage',
                'hidetext' => true,
                'required' => true
            ] : [])
        ];
    }


}
