<?php
declare(strict_types=1);

namespace StarterkitAreasBundle\Document\Areabrick;

use Pimcore\Model\Document;
use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick as PimcoreAbstractAreabrick;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Translation\Translator;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use function Sabre\Xml\Deserializer\valueObject;

abstract class AbstractBaseAreabrick extends PimcoreAbstractAreabrick
{

    protected Translator $translator;
    protected ParameterBagInterface $parameter;

    public function __construct(
        Translator            $translator,
        ParameterBagInterface $parameter)
    {
        $this->translator = $translator;
        $this->parameter = $parameter;
    }

    /**
     * {@inheritdoc}
     */
    public function action(Info $info): ?Response
    {
        $index = $info->getIndex();
        $info->getEditable()->setValue("index", $index);
        $info->setParam("index", $index);

        preg_match('/([^\\\]*)$/', get_called_class(), $matches);
        $className = strtolower($matches[0]);

        if ($this->container->hasParameter($className)) {
            $config = $this->container->getParameter($className);
            $info->setParam($className, $config);
        }

        return parent::action($info);
    }

    /**
     * {@inheritdoc}
     */
    public function getStore($storeName): array
    {

        preg_match('/([^\\\]*)$/', get_called_class(), $matches);
        $areaBrick = strtolower($matches[1]);
        if ($this->container->hasParameter($areaBrick)) {
            $config = $this->container->getParameter($areaBrick);
            foreach ($config as $array => $store) {
                if (preg_match('/Store$/', $array)) {

                    if ($array === $storeName . 'Store') {
                        $StoreOptions = [];
                        foreach ($store as $key => $option) {
                            $StoreOptions[] = [$key, $option['name']];
                        }
                        return $StoreOptions;
                    }

                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getBrickId(): string
    {
        return $this->getId();
    }

    /**
     * {@inheritdoc}
     */
    public function translationString($suffix): string
    {
        $translationKey = 'starterkitareas.area.' . $this->getBrickId() . '.' . $suffix;
        return $this->translator->trans($translationKey, [], 'admin');
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return $this->translationString('name');
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(): string
    {
        return $this->translationString('description');
    }

    public function getIcon(): string
    {
        $filename = 'bundles/starterkitareas/areas/icons/' . $this->getBrickId() . '.svg';
        if (file_exists($filename)) {
            return $filename;
        } else {
            return '';
        }
    }

    /**
     * @param Info $info
     *
     * @return string|null
     */
    protected function getOpenTagCssClass(Info $info)
    {
        return null;
    }

    /**
     * @return string
     */
    public function getHtmlTagOpen(Info $info)
    {
        return '<div class="wrapper--' . $this->getBrickId() . '">';
    }

    /**
     * @return string
     */
    public function getHtmlTagClose(Info $info)
    {
        return '</div>';
    }

    /**
     * @inheritDoc
     */
    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }

    /**
     * @inheritDoc
     */
    public function getTemplateSuffix()
    {
        return static::TEMPLATE_SUFFIX_TWIG;
    }

}
