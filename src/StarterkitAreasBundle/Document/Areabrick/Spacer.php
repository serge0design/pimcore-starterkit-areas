<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Spacer extends AbstractAreabrick implements EditableDialogBoxInterface
{
    public function getLeftCol()
    {
        return [
            [
                'type' => 'select',
                'name' => 'selectSpacerClass',
                'label' => $this->translationString('selectSpacerClass', [], 'admin'),
                'config' => [
                    'store' => [
                        ['-x1', $this->translationString('x1')],
                        ['-x2', $this->translationString('x2')],
                        ['-x3', $this->translationString('x3')],
                        ['-x4', $this->translationString('x4')],
                        ['-x5', $this->translationString('x5')],
                    ],
                    'defaultValue' => '-x1',
                    'reload' => true,
                ]
            ],
        ];
    }

    public function getRightCol()
    {
        return [];
    }

}
