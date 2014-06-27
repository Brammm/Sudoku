<?php

namespace Sudoku;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class Sudoku
{
    /** @var ContainerInterface */
    private $container;

    public function __construct()
    {
        $this->container = new ContainerBuilder();
        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__));
        $loader->load('Resources/config/services.yml');
    }

    public function getContainer()
    {
        return $this->container;
    }
} 