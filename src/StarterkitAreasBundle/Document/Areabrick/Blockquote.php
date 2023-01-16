<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Blockquote extends AbstractAreabrick
{

    public function getLeftCol(): array
    {
        return [
            [
                'type' => 'input',
                'name' => 'inputCite',
                'label' => $this->translationString('inputCite'),
                'config' => [
                    'placeholder' => $this->translationString('inputCite.placeholder')
                ]
            ],
            [
                'type' => 'checkbox',
                'name' => 'checkboxDisplayAuthor',
                'label' => $this->translationString('checkboxDisplayAuthor'),
                'config' => [
                    'reload' => true
                ]
            ]
        ];
        return [];
    }

    public function getRightCol(): array
    {
        return [];
    }

}
