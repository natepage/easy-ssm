<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Console\Commands;

use NatePage\EasySsm\Traits\ConsoleRendererAware;
use NatePage\EasySsm\Traits\DiffResolverAware;
use NatePage\EasySsm\Traits\ParametersHelperAware;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class ApplyCommand extends AbstractCommand
{
    use ConsoleRendererAware;
    use DiffResolverAware;
    use ParametersHelperAware;

    protected function configure()
    {
        $this->setName('apply');
        $this->setDescription('Apply diff to remote SSM parameters');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $awsProfile = $this->getAwsProfile();
        $filename = $this->getFilename();
        $style = new SymfonyStyle($input, $output);

        $style->comment(\sprintf('Apply Diff SSM parameters for profile "%s"', $awsProfile));

        $remote = $this->getRemoteParameters($style);

        // If out of sync, abort
        if ($this->hashChecker->checkHash($awsProfile, $remote) === false) {
            $style->warning(\sprintf(
                'Your local parameters for "%s" are out of sync, use pull command',
                $awsProfile
            ));

            return 1;
        }

        // Apply diff to remote SSM
        $local = $this->ssmParametersParser->parseParameters($filename);
        $diff = $this->diffResolver->diff($remote, $local);

        // Dump new hash
        $this->hashDumper->dumpHash($awsProfile, $this->parametersHelper->applyDiff($diff, $remote));

        $this->ssmClient->applyDiff($diff);
        $this->consoleRenderer->renderDiff($diff, $local, $output);

        return 0;
    }
}
