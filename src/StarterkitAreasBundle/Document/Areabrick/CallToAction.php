<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;

class CallToAction extends AbstractAreabrick implements EditableDialogBoxInterface
{

    //TODO: Make store configurable in yaml file
    public function getLeftCol(): array
    {
        return [
            [
                'type' => 'select',
                'name' => 'selectBtnType',
                'label' => $this->translationString('selectBtnType'),
                'config' => [
                    'store' => [
                        ['internal', $this->translationString('internal')],
                        ['external', $this->translationString('external')]
                    ],
                    'defaultValue' => 'internal',
                    'reload' => true,
                ]
            ],
            [
                'type' => 'select',
                'name' => 'selectBtnClass',
                'label' => $this->translationString('selectBtnClass'),
                'config' => [
                    'store' => $this->getStore('btnClass'),
                    'defaultValue' => 'default',
                    'reload' => true,
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxEnableModal',
                'label' => $this->translationString('checkboxEnableModal'),
                'config' => [
                    'placeholder' => $this->translationString('checkboxEnableModalYes')
                ]
            ]
        ];
    }

    //TODO: Make store configurable in yaml file
    public function getRightCol(Document\Editable $area): array
    {
        $sectionType = $this->getEditableData($area, 'select', 'selectBtnType');

        return ($sectionType === 'internal' ? [
            [
                'type' => 'relation',
                'name' => 'relationTypeInternal',
                'label' => $this->translationString('relationTypeInternal'),
                'config' => [
                    'reload' => true,
                    "types" => ["document", "asset", "object"],
                    "subtypes" => [
                        "document" => ["page"],
                        "asset" => ["image", "document"],
                        "object" => ["object"],
                    ]
                ]
            ]
        ] : ($sectionType === 'external' ? [
            [
                'type' => 'link',
                'name' => 'relationTypeExternal',
                'label' => $this->translationString('relationTypeExternal'),
            ],
        ] : []));
    }


}
