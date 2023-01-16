<?php

namespace StarterkitAreasBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\EnumNodeDefinition;
use Symfony\Component\Config\Definition\Builder\ScalarNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Form\Exception\InvalidConfigurationException;
use StarterkitAreasBundle\ToolboxConfig;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('starterkit_areas');
        $rootNode = $treeBuilder->getRootNode();

//        $this->getConfigNode($rootNode);

        return $treeBuilder;
    }

//    public function getConfigNode(ArrayNodeDefinition $rootNode): void
//    {
//        $rootNode
//            ->children()
//                ->append($this->buildAreasSection(true))
//            ->end();
//    }
//
//    protected function buildAreasSection(bool $internalTypes = false): ArrayNodeDefinition
//    {
//        $treeBuilder = new ArrayNodeDefinition($internalTypes ? 'areas' : 'custom_areas');
//
//        $treeBuilder
//            ->validate()
//            ->ifTrue(function ($v) use ($internalTypes) {
//                if ($internalTypes === false) {
//                    return false;
//                }
//
//                return count(array_diff(array_keys($v), ToolboxConfig::TOOLBOX_TYPES)) > 0;
//            })
//            ->then(function ($v) {
//                $invalidTags = array_diff(array_keys($v), ToolboxConfig::TOOLBOX_TYPES);
//
//                throw new InvalidConfigurationException(sprintf(
//                    'Invalid elements in toolbox "area" configuration: %s. to add custom areas, use the "custom_area" node. allowed tags for "area" are: %s',
//                    implode(', ', $invalidTags),
//                    implode(', ', ToolboxConfig::TOOLBOX_TYPES)
//                ));
//            })
//            ->end()
//            ->useAttributeAsKey('name')
//            ->prototype('array')
//            ->validate()
//            ->ifTrue(function ($v) {
//                $tabs = $v['tabs'];
//                return count($tabs) > 0 && count(array_filter($v['config_elements'], function($configElement) use ($tabs) {
//                        return !array_key_exists($configElement['tab'], $tabs);
//                    })) > 0;
//            })
//            ->then(function ($v) {
//                @trigger_error(
//                    sprintf('Missing or wrong area tab definition in config_elements. Available tabs are: %s', implode(', ', array_keys($v['tabs']))),
//                    E_USER_ERROR
//                );
//            })
//            ->end()
//            ->validate()
//            ->ifTrue(function ($v) {
//                $tabs = $v['tabs'];
//
//                return count($tabs) === 0 && count(array_filter($v['config_elements'], function($configElement) {
//                        return $configElement['tab'] !== null;
//                    })) > 0;
//            })
//            ->then(function ($v) {
//                @trigger_error('Unknown configured area tabs in config_elements. No tabs have been defined', E_USER_ERROR);
//            })
//            ->end()
//            ->children()
//            ->append($this->buildConfigElementsSection($internalTypes))
//            ->variableNode('config_parameter')->end()
//            ->end()
//            ->end()
//        ;
//
//        return $treeBuilder;
//    }
//
//    protected function buildConfigElementsSection(bool $internalTypes = false): ArrayNodeDefinition
//    {
//        $treeBuilder = new ArrayNodeDefinition('config_elements');
//
//        if ($internalTypes === true) {
//            //@todo: get them dynamically!!
//            $allowedTypes = array_merge(\StarterkitAreasBundle\ToolboxConfig::CORE_TYPES, ToolboxConfig::CUSTOM_TYPES);
//
//            $typeNode = new EnumNodeDefinition('type');
//            $typeNode->isRequired()->values($allowedTypes)->end();
//        } else {
//            $typeNode = new ScalarNodeDefinition('type');
//            $typeNode->isRequired()->end();
//        }
//
//        $treeBuilder
//            ->useAttributeAsKey('name')
//            ->prototype('array')
//            ->addDefaultsIfNotSet()
//                ->children()
//                    ->append($typeNode)
//                    ->scalarNode('flex_left')->defaultValue(null)->end()
//                    ->scalarNode('flex_right')->defaultValue(null)->end()
//                ->end()
//            ->end();
//
//        return $treeBuilder;
//    }
}
