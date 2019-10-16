<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ThemeParkTrainCommand extends Command
{
    protected static $defaultName = 'app:theme_park:train';

    protected function configure()
    {
        $this->setDescription('Train the theme park ML model');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
