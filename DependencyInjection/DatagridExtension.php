<?php

namespace DatagridBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class DatagridExtension extends Extension
{
	public function load(array $configs, Container $container)
	{
		$loader = new YamlFileLoader($container, new FileLocator(__DIR__.'../Resources/config'));
		$loader->load('services.yml');
		
		//$configuration = new DatagridConfiguration();
		//$this->processConfiguration($configuration, $configs);		
	}
}