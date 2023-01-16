<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Heading extends AbstractAreabrick
{

    public function getLeftCol(): array
    {
        return [
            [
                'type' => 'select',
                'name' => 'selectHeadingTag',
                'label' => $this->translationString('selectHeadingTag'),
                'config' => [
                    'store' => $this->getStore('headingTag'),
                    'defaultValue' => 'h2',
                    'reload' => true,
                ]
            ],
            [
                'type' => 'select',
                'name' => 'selectHeadingClass',
                'label' => $this->translationString('selectHeadingClass', [], 'admin'),
                'config' => [
                    'store' => $this->getStore('headingClass'),
                    'defaultValue' => '',
                    'reload' => true,
                ]
            ]
        ];
    }

    public function getRightCol(Document\Editable $area): array
    {
        $enableAnchor = $this->getEditableData($area, 'checkbox', 'checkboxEnableAnchor');
        $anchorText = $this->getEditableData($area, 'textarea', 'textareaHeadline');
        $anchorStr = ($enableAnchor && $anchorText != '' ?
            preg_replace('/\r|\n/', '-',
                str_replace(['\r', '\n', ' '], '-',
                    strtolower('#' . $anchorText)))
            : '');

        return [
            [
                'type' => 'simple_output',
                'name' => 'simpleOutputHeadingAnchor',
                'label' => $this->translationString('simpleOutputHeadingAnchor') . ':',
                'config' => [
                    'class' => ($anchorStr != '' ? 'alert alert-success' : ''),
                    'value' => ($enableAnchor ? $anchorStr : ''),
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxEnableAnchor',
                'label' => $this->translationString('checkboxEnableAnchor'),
                'config' => [
                    'reload' => true
                ]
            ],
        ];
    }
}
