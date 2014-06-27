<?php

namespace Sudoku;

use Sudoku\Grid\Grid;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class Sudoku
{
    /** @var array */
    private $grid;
    /** @var ContainerInterface */
    private $container;


    public function __construct(array $grid)
    {
        $this->initContainer();

        $this->grid = Grid::fromArray($grid);
    }

    private function initContainer()
    {
        $this->container = new ContainerBuilder();
        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__));
        $loader->load('Resources/config/services.yml');
    }


} 