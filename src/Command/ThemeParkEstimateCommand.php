<?php

namespace App\Command;

use Phpml\ModelManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ThemeParkEstimateCommand extends Command
{
    protected static $defaultName = 'app:theme_park:estimate';

    protected function configure()
    {
        $this
            ->setDescription('Estimate the waiting time for a theme park')
            ->addArgument('weekday', InputArgument::REQUIRED)
            ->addArgument('weather', InputArgument::REQUIRED)
            ->addArgument('vacation', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!file_exists(__DIR__ . '/../../data/model.dat')) {
            $output->writeln('<error>Model not found. Did you do train it? (train commnad)</error>');
            return;
        }

        $modelManager = new ModelManager();
        $estimator = $modelManager->restoreFromFile(__DIR__ . '/../../data/model.dat');
        $prediction = $estimator->predict([[
            $input->getArgument('weekday'),
            $input->getArgument('weather'),
            $input->getArgument('vacation')
        ]]);
        $output->writeln(sprintf('Prediction is: <info>%s</info>', round($prediction[0], 2)));
    }
}
