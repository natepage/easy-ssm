<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Console\Commands;

use NatePage\EasySsm\Traits\ConsoleRendererAware;
use NatePage\EasySsm\Traits\DiffResolverAware;
use NatePage\EasySsm\Traits\ParametersHelperAware;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class LocalApplyCommand extends AbstractCommand
{
    use ConsoleRendererAware;
    use DiffResolverAware;
    use ParametersHelperAware;

    protected function configure()
    {
        $this->setName('local-apply');
        $this->setDescription('Display local diff between old and local SSM parameters');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $awsProfile = $this->getAwsProfile();
        $filename = $this->getFilename();
        $oldFilename = $this->getOldFilename();
        $style = new SymfonyStyle($input, $output);

        $style->comment(\sprintf('Apply local Diff SSM parameters for profile "%s"', $awsProfile));

        if ($this->filesystem->exists($oldFilename) === false) {
            $style->warning(\sprintf('Old parameters "%s" doesn\'t exist', $oldFilename));

            return 1;
        }

        $local = $this->ssmParametersParser->parseParameters($filename);
        $old = $this->ssmParametersParser->parseParameters($oldFilename);
        $diff = $this->diffResolver->diff($local, $old);

        $applied = $this->parametersHelper->applyDiff($diff, $local);

        $this->ssmParametersDumper->dumpParameters($filename, $applied);
        $this->filesystem->remove($oldFilename);

        $this->consoleRenderer->renderDiff($diff, $local, $output);

        return 0;
    }
}
