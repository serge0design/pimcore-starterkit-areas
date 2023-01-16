<?php
declare(strict_types=1);

namespace StarterkitAreasBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;
use Pimcore\Routing\RouteReferenceInterface;
use StarterkitAreasBundle\Tools\Install;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class StarterkitAreasBundle extends AbstractPimcoreBundle
{
//    use PackageVersionTrait;

    public const PACKAGE_NAME = 'serge-design/starterkitareas';

    public function getInstaller(): Install
    {
        return $this->container->get(Install::class);
    }

    public function getJsPaths()
    {
        return [
            '/bundles/starterkitareas/js/pimcore/startup.js'
        ];
    }

    /**
     * Get stylesheets to include in editmode
     *
     * @return string[]|RouteReferenceInterface[]
     */
    public function getEditmodeCssPaths(): array
    {
        return [
            '/bundles/starterkitareas/css/editmode.css',
        ];
    }

    protected function getComposerPackageName(): string
    {
        return self::PACKAGE_NAME;
    }

    public function getDescription()
    {
        return 'A simple collection of areabricks.';
    }


    public function getVersion(){
        return '1.0.0';
    }
}