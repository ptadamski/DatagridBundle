<?php

namespace DatagridBundle\Tests\Mock;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping\ClassMetadata;

class DummyPersistanceManager implements ObjectManager
{
	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::find()
	 */
	public function find($className, $id) {
		// TODO: Auto-generated method stub

	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::persist()
	 */
	public function persist($object) {
		// TODO: Auto-generated method stub

	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::remove()
	 */
	public function remove($object) {
		// TODO: Auto-generated method stub

	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::merge()
	 */
	public function merge($object) {
		// TODO: Auto-generated method stub

	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::clear()
	 */
	public function clear($objectName = null) {
		// TODO: Auto-generated method stub

	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::detach()
	 */
	public function detach($object) {
		// TODO: Auto-generated method stub

	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::refresh()
	 */
	public function refresh($object) {
		// TODO: Auto-generated method stub

	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::flush()
	 */
	public function flush() {
		// TODO: Auto-generated method stub

	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::getRepository()
	 */
	public function getRepository($className) {
		// TODO: Auto-generated method stub

	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::getClassMetadata()
	 */
	public function getClassMetadata($className) 
	{
		$metadata = new ClassMetadata($className);
		$metadata->isIdentifierComposite = false;
		$metadata->identifier = array('username');
		$metadata->fieldMappings = array(
				'email' => 'string', 
				'age' => 'int', 
				'fav_animal' =>'string', 
				'username' => 'string'
		);
		$metadata->associationMappings = array('some_ref' => 'Object');
		return $metadata;
	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::getMetadataFactory()
	 */
	public function getMetadataFactory() {
		// TODO: Auto-generated method stub

	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::initializeObject()
	 */
	public function initializeObject($obj) {
		// TODO: Auto-generated method stub

	}

	/**
	 * {@inheritDoc}
	 * @see \Doctrine\Common\Persistence\ObjectManager::contains()
	 */
	public function contains($object) {
		// TODO: Auto-generated method stub

	}

}