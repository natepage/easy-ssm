<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Filesystem;

use NatePage\EasySsm\Helpers\Arr;
use NatePage\EasySsm\Traits\FilesystemAware;
use Symfony\Component\Yaml\Tag\TaggedValue;
use Symfony\Component\Yaml\Yaml;

final class SsmParametersDumper implements SsmParametersDumperInterface
{
    use FilesystemAware;

    /**
     * Dump SSM parameters to given filename.
     *
     * @param string $filename
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $parameters
     *
     * @return void
     */
    public function dumpParameters(string $filename, array $parameters): void
    {
        $this->filesystem->dumpFile($filename, Yaml::dump(
            $this->unflatten($parameters),
            \PHP_INT_MAX,
            4,
            Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK
        ));
    }

    /**
     * Unflatten parameters array for YAML.
     *
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $parameters
     *
     * @return mixed[]
     */
    private function unflatten(array $parameters): array
    {
        $array = [];

        foreach ($parameters as $parameter) {
            $name = $parameter->getName();
            $value = $parameter->getValue();

            if ($parameter->getType() !== 'SecureString') {
                $array[$name] = $value;

                continue;
            }

            $array[$name] = new TaggedValue('secure', $value);
        }

        \ksort($array);

        return (new Arr())->unflatten($array);
    }
}
