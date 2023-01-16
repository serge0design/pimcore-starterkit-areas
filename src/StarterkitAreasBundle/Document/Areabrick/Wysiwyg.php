<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Wysiwyg extends AbstractAreabrick
{

    public function getLeftCol()
    {
        return [
            [
                'type' => 'select',
                'name' => 'selectWysiwygType',
                'label' => $this->translationString('selectWysiwygType'),
                'config' => [
                    'store' => [
                        ['', $this->translationString('default')],
                        ['card', $this->translationString('medium')],
                        ['minimal', $this->translationString('minimal')]
                    ],
                    'defaultValue' => '',
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
