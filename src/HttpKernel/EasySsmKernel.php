<?php
declare(strict_types=1);

namespace NatePage\EasySsm\HttpKernel;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symplify\AutowireArrayParameter\DependencyInjection\CompilerPass\AutowireArrayParameterCompilerPass;
use Symplify\PackageBuilder\DependencyInjection\CompilerPass\AutoReturnFactoryCompilerPass;
use Symplify\PackageBuilder\HttpKernel\SimpleKernelTrait;

final class EasySsmKernel extends Kernel
{
    use SimpleKernelTrait;

    /**
     * EasySsmKernel constructor.
     */
    public function __construct()
    {
        parent::__construct($this->getUniqueKernelKey(), false);
    }

    /**
     * Get cache directory for kernel.
     *
     * @return string
     */
    public function getCacheDir(): string
    {
        return __DIR__ . '/../../var/kernel/' . $this->getUniqueKernelKey();
    }

    /**
     * Get log directory for kernel.
     *
     * @return string
     */
    public function getLogDir(): string
    {
        return __DIR__ . '/../../var/kernel/' . $this->getUniqueKernelKey() . '_logs';
    }

    /**
     * Loads the container configuration.
     *
     * @param \Symfony\Component\Config\Loader\LoaderInterface $loader
     *
     * @return void
     *
     * @throws \Exception
     */
    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(__DIR__ . '/../../config/parameters.yaml');
        $loader->load(__DIR__ . '/../../config/services.yaml');
    }

    /**
     * Add compiler passes.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     */
    protected function build(ContainerBuilder $container): void
    {
        $container
            ->addCompilerPass(new AutoReturnFactoryCompilerPass())
            ->addCompilerPass(new AutowireArrayParameterCompilerPass());
    }
}
