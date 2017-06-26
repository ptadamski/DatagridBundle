<?php
namespace DatagridBundle\Tests;

use DatagridBundle\Serializer\Metadata\AttributeMetadataHandler;
use DatagridBundle\Serializer\Metadata\DoctrineMetadataFactory;
use PHPUnit\Framework\TestCase;
use DatagridBundle\Tests\Mock\DummyPersistanceManager;

class DoctrineMetadataFactoryTest extends TestCase
{
	public function testDoctrineMetadataFactory()
	{
		$om = new DummyPersistanceManager();
		$metadataHandler = new AttributeMetadataHandler();
		$metadataFactory = new DoctrineMetadataFactory($om, $metadataHandler);
		$metadata = $metadataFactory->getMetadataFor(null);
		$this->assertContains('identifiers', $metadata->getAttributesMetadata()['username']->getGroups());
		$this->assertContains('properties', $metadata->getAttributesMetadata()['username']->getGroups());
		$this->assertNotContains('references', $metadata->getAttributesMetadata()['username']->getGroups());
	}
}