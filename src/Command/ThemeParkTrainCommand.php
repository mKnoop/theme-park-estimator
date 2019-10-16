<?php

namespace App\Command;

use Phpml\CrossValidation\RandomSplit;
use Phpml\Dataset\CsvDataset;
use Phpml\ModelManager;
use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ThemeParkTrainCommand extends Command
{
    protected static $defaultName = 'app:theme_park:train';

    protected function configure()
    {
        $this
            ->setDescription('Train the theme park ML model')
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                'The name of the theme park that should be trained'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dataset = new CsvDataset(__DIR__ . '/../../data/test-park.csv', 3, true, ';');
        $split = new RandomSplit($dataset);
        $estimator = new SVR(Kernel::LINEAR);
        $estimator->train($split->getTrainSamples(), $split->getTrainLabels());

        $modelManager = new ModelManager();
        $modelManager->saveToFile($estimator, __DIR__.'/../../data/model.dat');
        $output->writeln('New theme park model trained!');
    }
}
