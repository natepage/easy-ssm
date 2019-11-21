<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Console\Commands;

use NatePage\EasySsm\Traits\AwsProfileProviderAware;
use NatePage\EasySsm\Traits\FilesystemAware;
use NatePage\EasySsm\Traits\HashCheckerAware;
use NatePage\EasySsm\Traits\HashDumperAware;
use NatePage\EasySsm\Traits\SsmClientAware;
use NatePage\EasySsm\Traits\SsmParametersDumperAware;
use NatePage\EasySsm\Traits\SsmParametersParserAware;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;

abstract class AbstractCommand extends Command
{
    use AwsProfileProviderAware;
    use FilesystemAware;
    use HashCheckerAware;
    use HashDumperAware;
    use SsmClientAware;
    use SsmParametersDumperAware;
    use SsmParametersParserAware;

    protected function getAwsProfile(): string
    {
        return $this->awsProfileProvider->getProfile();
    }

    protected function getFilename(): string
    {
        return \sprintf('%s/%s.yaml', \getcwd(), $this->getAwsProfile());
    }

    protected function getOldFilename(): string
    {
        return \sprintf('%s_old', $this->getFilename());
    }

    /**
     * Get remote parameters with error handling.
     *
     * @param \Symfony\Component\Console\Style\SymfonyStyle $style
     *
     * @return \NatePage\EasySsm\Services\Aws\Data\SsmParameter[]
     */
    protected function getRemoteParameters(SymfonyStyle $style): array
    {
        try {
            return $this->ssmClient->getAllParameters();
        } catch (\Exception $exception) {
            $style->error($exception->getMessage());
        }

        return [];
    }
}
