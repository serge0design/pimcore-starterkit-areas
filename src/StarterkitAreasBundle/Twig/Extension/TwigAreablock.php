<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigTest;
use Twig\TwigFunction;

class TwigAreablock extends AbstractExtension
{

    /**
     * @var string
     */
    protected $areablocks;

    public function __construct($areablocks)
    {
        $this->areablocks = $areablocks;
    }

    public function getFunctions():array
    {
        return [
            new TwigFunction('areablockConfig', [$this, 'areablockConfig'])
        ];
    }

    public function areablockConfig($areablockName, string $areablockCssClass = '')
    {
        $areablockConfigs = $this->areablocks;
        $areas = [];
        $areablockGroups = [];

        if (array_key_exists($areablockName, $areablockConfigs)) {

            foreach ($areablockConfigs[$areablockName] as $areablockGroupName => $allowedAreas) {
                $areas = array_merge($areas, $allowedAreas);
                $areablockGroups[str_replace(["_", "-"], [" ", " "], $areablockGroupName)] = $allowedAreas;
            }

            if (count($areablockGroups) > 1) {
                return [
                    "group" => $areablockGroups,
                    "allowed" => $areas,
                    "dontCheckEnabled" => false,
                    "controlsAlign" => "top",
                    "class" => $areablockCssClass,
                ];
            }

            return [
                "allowed" => $areas,
                "dontCheckEnabled" => false,
                "controlsAlign" => "top",
                "class" => $areablockCssClass
            ];

        } else {
            return [
                "allowed" => $areas,
                "dontCheckEnabled" => false,
                "controlsAlign" => "top",
                "class" => $areablockCssClass
            ];
        }
    }
}
