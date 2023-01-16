<?php

namespace StarterkitAreasBundle\Builder;


use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;

interface BrickDialogBoxConfigBuilderInterface
{
    public function buildCustomEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info):EditableDialogBoxConfiguration;
}