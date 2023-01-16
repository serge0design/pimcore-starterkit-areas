<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Iframe extends AbstractAreabrick
{
    /**
     * {@inheritdoc}
     */
    public function getLeftCol(): array
    {
        return
            [
                [
                    'type' => 'input',
                    'name' => 'inputName',
                    'label' => $this->translationString('inputName'),
                ],
                [
                    'type' => 'input',
                    'name' => 'inputClass',
                    'label' => $this->translationString('inputClass'),
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'checkboxReadonly',
                    'label' => $this->translationString('checkboxReadonly'),
                    'config' => [
                        'reload' => true,
                    ]
                ]
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function getRightCol(): array
    {
        return [
            [
                'type' => 'textarea',
                'name' => 'textareaSrc',
                'label' => $this->translationString('textareaSrc'),
                'config' => [
                    'nl2br' => false,
                    'required' => true
                ]
            ],
//            [
//                'type' => 'multiselect',
//                'name' => 'multiselectSandboxType',
//                'label' => $this->translationString('multiselectSandboxType'),
//                'config' => [
//                    'store' => [
//                        ['', 'Keine Sandbox (Standard)'],
//                        ['allow-downloads-without-user-activation', 'allow-downloads-without-user-activation'],
//                        ['allow-downloads', 'allow-downloads'],
//                        ['allow-forms', 'allow-forms'],
//                        ['allow-modals', 'allow-modals'],
//                        ['allow-orientation-lock', 'allow-orientation-lock'],
//                        ['allow-pointer-lock', 'allow-pointer-lock'],
//                        ['allow-popups', 'allow-popups'],
//                        ['allow-popups-to-escape-sandbox', 'allow-popups-to-escape-sandbox'],
//                        ['allow-presentation', 'allow-presentation'],
//                        ['allow-same-origin', 'allow-same-origin'],
//                        ['allow-scripts', 'allow-scripts'],
//                        ['allow-storage-access-by-user-activation', 'allow-storage-access-by-user-activation'],
//                        ['allow-top-navigation', 'allow-top-navigation'],
//                        ['allow-top-navigation-by-user-activation', 'allow-top-navigation-by-user-activation'],
//                    ],
//                    'defaultValue' => '',
//                    'reload' => false,
//                ]
//            ],
            [
                'type' => 'select',
                'name' => 'selectReferrerpolicyType',
                'label' => $this->translationString('selectReferrerpolicyType'),
                'config' => [
                    'store' => [
                        ['no-referrer', 'no-referrer'],
                        ['no-referrer-when-downgrade', 'no-referrer-when-downgrade'],
                        ['origin', 'origin'],
                        ['origin-when-cross-origin', 'origin-when-cross-origin'],
                        ['same-origin', 'same-origin'],
                        ['strict-origin', 'strict-origin'],
                        ['strict-origin-when-cross-origin', 'strict-origin-when-cross-origin'],
                        ['unsafe-url', 'unsafe-url']
                    ],
                    'defaultValue' => 'no-referrer',
                    'reload' => true,
                ]
            ],
        ];
    }
}
