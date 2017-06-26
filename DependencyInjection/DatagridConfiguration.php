<?php

namespace DatagridBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use DatagridBundle\DependencyInjection\Configuration\NormalizerConfigFactoryInterface;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;

class DatagridConfiguration implements ConfigurationInterface 
{
	private $normalizerConfigFactory;
	
	public function __construct($normalizerConfigFactories)
	{
		foreach($normalizerConfigFactories as $factory) {
			if(!$factory instanceof NormalizerConfigFactoryInterface)
				throw new \LogicException();
		}
		
		$this->normalizerConfigFactories = $normalizerConfigFactories;
	}
	
	public function getConfigTreeBuilder() 
	{
		$tb = new TreeBuilder();
		$root = $tb->root('datagrid');
		
		$this->addSerializationSection($root);
		
		return $tb;
		
	}
	
	private function addSerializationSection(NodeBuilder $builder)
	{
		$builder
			->arrayNode('serialization')
			->end();
	}
	
	private function addConfigFactoriesSection(NodeBuilder $builder)
	{
		$factoriesBuilder = $builder->arrayNode()->children();
		
		/**@var NormalizerConfigFactoryInterface $factory*/
		foreach($this->normalizerConfigFactory as $factory) {
			$this->addConfigFactorySection($factoriesBuilder, $factory);
		}
		
		$factoriesBuilder->end()->end();
	}
	
	private function addConfigFactorySection(NodeBuilder $builder, NormalizerConfigFactoryInterface $factory)
	{
		$factory->addConfiguration($node);
		
	}

}