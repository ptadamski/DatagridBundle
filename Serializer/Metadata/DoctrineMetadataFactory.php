<?php

namespace DatagridBundle\Serializer\Metadata;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Serializer\Mapping\AttributeMetadata;
use Symfony\Component\Serializer\Mapping\ClassMetadata;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface;

class DoctrineMetadataFactory implements ClassMetadataFactoryInterface
{
	private $metadataHandler;
	private $om;
	
	public function __construct(ObjectManager $om, AttributeMetadataHandlerInterface $metadataHandler)
	{
		$this->metadataHandler = $metadataHandler;
		$this->om = $om;
	}
	
	public function getMetadataFor($value) 
	{
		$class = get_class($value);		
		$metadata = $this->om->getClassMetadata($class);
		$result = new ClassMetadata($class);
		
		foreach(array_merge($metadata->getFieldNames(), $metadata->getAssociationNames()) as $name) {
			$attributeMetadata = new AttributeMetadata($name);
			$this->metadataHandler->handle($metadata, $attributeMetadata);
			$result->addAttributeMetadata($attributeMetadata);
		}	
		
		return $result;
	}
	
	public function hasMetadataFor($value) 
	{		
		return $this->om->getClassMetadata(get_class($value)) != null;
	}
}