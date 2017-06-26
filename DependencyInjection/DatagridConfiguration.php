<?php

namespace DatagridBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class DatagridConfiguration implements ConfigurationInterface 
{
	public function getConfigTreeBuilder() 
	{
		$tb = new TreeBuilder();
		return $tb;
	}

}