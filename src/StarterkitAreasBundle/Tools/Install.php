<?php

namespace StarterkitAreasBundle\Tools;

use App\Document\Areabrick\AbstractAreabrick;
use Pimcore\Extension\Bundle\Installer\SettingsStoreAwareInstaller;
use Pimcore\Bundle\AdminBundle\Security\User\TokenStorageUserResolver;
use Pimcore\Extension\Bundle\Installer\Exception\InstallationException;
use Pimcore\Model\DataObject\Folder;
use Pimcore\Model\Document\DocType;
use Pimcore\Model\Translation;
use Pimcore\Model\User;
use Pimcore\Tool;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

class Install extends SettingsStoreAwareInstaller
{

    protected TokenStorageUserResolver $resolver;

    private string $sourceFiles;
    private string $classesFiles;
    private Filesystem $filesystem;
    private string $installSourcesPath;
    public const SYSTEM_CONFIG_DIR_PATH = PIMCORE_PRIVATE_VAR . '/bundles/StarterkitAreasBundle';

    public function setTokenStorageUserResolver(TokenStorageUserResolver $resolver): void
    {
        $this->resolver = $resolver;
    }

    public function install(): void
    {
        $this->installSourcesPath = __DIR__ . '/../Resources/install';

        $this->installFiles();
        $this->installTranslations();
        $this->installDocumentTypes();
        $this->createObjectFolders();
//        $this->createAssetFolders();

        parent::install();
    }

    private function installFiles(): void
    {

        $sourceFiles = dirname(__DIR__) . '/Resources/install/files';
        $sourceFiles = realpath($sourceFiles);
        $projectRoot = PIMCORE_PROJECT_ROOT;

        try {

            $filesystem = new Filesystem();
            $filesystem->mirror($sourceFiles, $projectRoot);

        } catch (IOExceptionInterface $e) {
            echo "An error occurred while creating your directory at " . $e->getPath();
        }
    }

    public function createObjectFolders(): void
    {

        $root = Folder::getByPath('/slider');
        $entries = Folder::getByPath('/slider/example');

        if (!$root instanceof Folder) {
            $root = Folder::create([
                'o_parentId' => 1,
                'o_creationDate' => time(),
                'o_userOwner' => $this->getUserId(),
                'o_userModification' => $this->getUserId(),
                'o_key' => 'slider',
                'o_published' => true,
            ]);
        }

        if (!$entries instanceof Folder) {
            Folder::create([
                'o_parentId' => $root->getId(),
                'o_creationDate' => time(),
                'o_userOwner' => $this->getUserId(),
                'o_userModification' => $this->getUserId(),
                'o_key' => 'example',
                'o_published' => true,
            ]);
        }
    }


    private function installTranslations(): void
    {
        $csv = $this->installSourcesPath . '/translations/data.csv';
        try {
            Translation::importTranslationsFromFile($csv, Translation::DOMAIN_ADMIN, true, Tool\Admin::getLanguages());
        } catch (\Exception $e) {
            throw new InstallationException(sprintf('Failed to install admin translations. error was: "%s"', $e->getMessage()));
        }
    }

    private function installDocumentTypes(): void
    {
        $list = new DocType\Listing();
        $skipInstall = false;
        $elementName = 'Starterkit-Areas: Example Page';

        /** @var DocType $type */
        foreach ($list->getDocTypes() as $type) {
            if ($type->getName() === $elementName) {
                $skipInstall = true;
                break;
            }
        }

        if ($skipInstall) {
            return;
        }

        $type = DocType::create();

        $type->setValues(
            [
                'name' => $elementName,
                'controller' => 'StarterkitAreasBundle\Controller\ExamplesController::defaultAction',
                'type' => 'page',
                'priority' => 0
            ]
        );

        try {
            $type->getDao()->save();
        } catch (\Exception $e) {
            throw new InstallationException(sprintf('Failed to save document type "%s". Error was: "%s"', $elementName, $e->getMessage()));
        }
    }

    protected function getUserId(): int
    {
        $userId = 0;
        $user = $this->resolver->getUser();
        if ($user instanceof User) {
            $userId = $this->resolver->getUser()->getId();
        }

        return $userId;
    }

}
