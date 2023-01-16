<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class OnePager extends AbstractAreabrick
{

    public function getLeftCol(): array
    {
        return [
            [
                'type' => 'relation',
                'name' => 'relationAnchorParentDoc',
                'label' => $this->translationString('relationAnchorParentDoc'),
                'config' => [
                    'reload' => false
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxDisplayAnchorIdInEditmode',
                'label' => $this->translationString('checkboxDisplayAnchorIdInEditmode'),
                'config' => [
                    'reload' => false
                ]
            ]
        ];
    }

    public function getRightCol()
    {
        return [];
    }

}
