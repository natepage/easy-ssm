<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Filesystem;

use NatePage\EasySsm\Helpers\Arr;
use NatePage\EasySsm\Services\Aws\Data\SsmParameter;
use NatePage\EasySsm\Services\Filesystem\Exceptions\InvalidTagException;
use Symfony\Component\Yaml\Tag\TaggedValue;
use Symfony\Component\Yaml\Yaml;

final class SsmParametersParser implements SsmParametersParserInterface
{
    /** @var \NatePage\EasySsm\Helpers\Arr */
    private $arr;

    /**
     * SsmParametersParser constructor.
     */
    public function __construct()
    {
        $this->arr = new Arr();
    }

    /**
     * Parse given filename and return array of ssm parameters.
     *
     * @param string $filename
     *
     * @return \NatePage\EasySsm\Services\Aws\Data\SsmParameter[]
     *
     * @throws \NatePage\EasySsm\Services\Filesystem\Exceptions\InvalidTagException
     */
    public function parseParameters(string $filename): array
    {
        $content = $this->arr->flatten(Yaml::parseFile($filename, Yaml::PARSE_CUSTOM_TAGS));
        $params = [];

        foreach ($content as $name => $value) {
            // Prefix param name with root /
            $name = \sprintf('/%s', $name);

            if ($value instanceof TaggedValue) {
                if ($value->getTag() !== 'secure') {
                    throw new InvalidTagException(\sprintf('Expected tag "secure", "%s" given', $value->getTag()));
                }

                $params[] = new SsmParameter($name, 'SecureString', $this->getValue($value->getValue()));

                continue;
            }

            $params[] = new SsmParameter($name, 'String', $this->getValue($value));
        }

        return $params;
    }

    private function getValue($value)
    {
        if (\is_string($value) === false) {
            return $value;
        }

        return \trim($value);
    }
}
