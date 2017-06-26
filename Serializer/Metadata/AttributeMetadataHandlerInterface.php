<?php

namespace DatagridBundle\Serializer\Metadata;

use Symfony\Component\Serializer\Mapping\AttributeMetadataInterface;

interface AttributeMetadataHandlerInterface 
{
	/**
	 * @param mixed $metadata
	 * @param AttributeMetadataInterface $attributeMetadata
	 */
	public function handle($metadata, AttributeMetadataInterface $attributeMetadata);
	
	public function getGroups();
}