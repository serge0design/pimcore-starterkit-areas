<?php

namespace StarterkitAreasBundle\Builder;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Translation\Translator;
use Pimcore\Model\Document;

class BrickDialogBoxConfigBuilder implements BrickDialogBoxConfigBuilderInterface
{

    protected Translator $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }


    /**
     * {@inheritdoc}
     */


    public function buildCustomEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {

        $config = new EditableDialogBoxConfiguration();
//        $config->cls = 'dialogbox-wrapper';
//        $config->paneltitle = $this->getName() . ' ' . $this->translator->trans('starterkitareas.dialogbox.paneltitle', [], 'admin');
//        $config->setReloadOnClose(true);
//        $config->setItems([
//            'type' => 'panel',
//            'layout' => [
//                'type' => 'hbox',
//            ],
//            'items' => [
//                [
//                    'type' => 'panel',
//                    'flex' => 1,
//                    'items' => $this->getLeftCol(),
//                ],
//                [
//                    'type' => 'panel',
//                    'flex' => 2,
//                    'items' => $this->getRightCol(),
//                ]
//            ]
//        ]);

        return $config;
    }

    public function getLeftCol(){
        return [];
    }

    public function getRightCol(){
        return [];
    }

}