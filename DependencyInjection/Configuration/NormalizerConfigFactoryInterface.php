<?php

namespace DatagridBundle\DependencyInjection\Configuration;

use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeParentInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

interface NormalizerConfigFactoryInterface 
{
	/**
	 * 
	 * @param NodeDefinition|ArrayNodeDefinition $node
	 */
	public function addConfiguration(NodeParentInterface $node);
}