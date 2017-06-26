<?php

namespace DatagridBundle\DependencyInjection\Configuration;

use DatagridBundle\Serializer\Metadata\AttributeMetadataHandlerInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class DoctrineNormalizerConfigFactory implements NormalizerConfigFactoryInterface
{
	private $metadataHandler;
	
	public function __construct(AttributeMetadataHandlerInterface $metadataHandler)
	{
		$this->metadataHandler = $metadataHandler;
	}
	
	public function addConfiguration($node) 
	{
		if(!$node instanceof ArrayNodeDefinition){
			return;
		}
		
		$builder = $node->children();
		
		foreach($this->metadataHandler->getGroups() as $group) {
			$builder->scalarNode($group)->end();
		}
		
		$builder->end();
	}

}