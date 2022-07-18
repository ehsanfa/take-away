<?php

namespace App\modules\shared;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

abstract class SharedKernel extends BaseKernel
{
    use MicroKernelTrait;

    abstract public function getModule(): string;

    private function getConfigDir(): string
    {
        return __DIR__.'/../'.$this->getModule().'/config';
    }

    private function getSharedConfigDir(): string
    {
        return __DIR__.'/config';
    }

    private function getBundlesPath(): string
    {
        return $this->determinePath('/bundles.php');
    }

    public function getCacheDir(): string
    {
        return  $this->getProjectDir().'/var/'.$this->environment.'/modules/'.$this->getModule().'/cache';
    }

    private function configureContainer(ContainerConfigurator $container, LoaderInterface $loader, ContainerBuilder $builder): void
    {
        $container->import($this->getSharedConfigDir().'/{packages}/*.{php,yaml}');
        $container->import($this->getConfigDir().'/{packages}/*.{php,yaml}');
        $container->import($this->determinePath('/{packages}/'.$this->environment.'/*.{php,yaml}'));

        if (is_file($this->determinePath('/services.yaml'))) {
            $container->import($this->determinePath('/services.yaml'));
            $container->import($this->determinePath('/{services}_'.$this->environment.'.yaml'));
        } else {
            $container->import($this->determinePath('/{services}.php'));
        }
    }

    private function determinePath($path)
    {
        if (is_file($this->getConfigDir().$path)) {
            return $this->getConfigDir().$path;
        }
        return $this->getSharedConfigDir().$path;
    }
}