<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Aws\Data;

final class SsmParameter
{
    /** @var string */
    private $name;

    /** @var string */
    private $type;

    /** @var string */
    private $value;

    /**
     * SsmParameter constructor.
     *
     * @param string $name
     * @param string $type
     * @param string $value
     */
    public function __construct(
        string $name,
        string $type,
        string $value
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return mixed[]
     */
    public function toArray(): array
    {
        return [
            'Name' => $this->getName(),
            'Type' => $this->getType(),
            'Value' => $this->getValue()
        ];
    }
}
