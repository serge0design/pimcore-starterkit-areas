<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Translation\Translator;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

abstract class AbstractAreabrick extends AbstractBaseAreabrick implements EditableDialogBoxInterface
{

    /**
     * {@inheritdoc}
     */
    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {

        $config = new EditableDialogBoxConfiguration();
        $config->cls = 'dialogbox-wrapper';
        $config->paneltitle = $this->getName() . ' ' . $this->translationString('paneltitle');
        $config->setReloadOnClose(true);

        $config->setItems([
            'type' => 'panel',
            'layout' => [
                'type' => 'hbox',
            ],
            'items' => [
                [
                    'type' => 'panel',
                    'flex' => 1,
                    'items' => $this->getLeftCol($area),
                ],
                [
                    'type' => 'panel',
                    'flex' => 2,
                    'items' => $this->getRightCol($area),
                ]
            ]
        ]);
        return $config;
    }

    public function getEditableData(Document\Editable $area, $type, $name)
    {
        return $this->editableRenderer->getEditable($area->getDocument(), $type, $name)->getData();
    }
}
