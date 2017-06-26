<?php

namespace DatagridBundle\Serializer\Metadata;

use Symfony\Component\Serializer\Mapping\AttributeMetadataInterface;
use Doctrine\Common\Persistence\Mapping\ClassMetadata;

class AttributeMetadataHandler implements AttributeMetadataHandlerInterface
{
	private $groups = array('pk' => 'identifiers', 'fk'=>'references', 'prop'=>'properties');
	
	/**
	 * @param ClassMetadata $metadata
	 * {@inheritDoc}
	 * @see \DatagridBundle\Serializer\Metadata\AttributeMetadataHandlerInterface::process()
	 */
	public function handle($metadata, AttributeMetadataInterface $attributeMetadata)
	{
		if($metadata->isIdentifier($attributeMetadata->getName())) {
			$attributeMetadata->addGroup($this->groups['pk']);
		}
		
		$attributeMetadata->addGroup($metadata->hasAssociation($attributeMetadata->getName()) ?
				$this->groups['fk'] : 
				$this->groups['prop']);
	}
	
	public function getGroups()
	{
		return array_values($this->groups);
	}
}