<?php

namespace DatagridBundle\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ConfigurationAwareNormalizer implements NormalizerInterface, DenormalizerInterface
{
	private $normalizer;
	private $configuration;
	
	public function __construct($normalizer, $configuration)
	{
		$this->normalizer = $normalizer;
		$this->configuration = $configuration;
	}
	
	public function normalize($object, $format = null, array $context = []) 
	{		
		$this->normalizer->normalize($object, $format, $this->configuration->getConfig());
	}
	
	public function supportsNormalization($data, $format = null) 
	{
		return $this->normalizer->supportsNormalization($data, $format);
	}
	
	public function denormalize($data, $class, $format = null, array $context = []) 
	{
		return $this->normalizer->denormalize($data, $class, $format, $this->configuration->getConfig());
	}
	
	public function supportsDenormalization($data, $type, $format = null) 
	{
		return $this->normalizer->supportsDenormalization($data, $type, $format);	
	}

}