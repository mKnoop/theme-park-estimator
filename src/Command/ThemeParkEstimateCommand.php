<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ThemeParkEstimateCommand extends Command
{
    protected static $defaultName = 'app:theme_park:estimate';

    protected function configure()
    {
        $this->setDescription('Estimate the waiting time for a theme park');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
