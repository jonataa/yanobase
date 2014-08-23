<?php

namespace Yanobase\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MigrateCommand extends Command
{

	protected function configure()
	{
	    $this
	        ->setName('migrate')
	        ->setDescription('Make the database migration')
	        ->addArgument(
	            'path',
	            InputArgument::OPTIONAL,
	            'Where is your migration files?'
	        )
	        ->addOption(
	           'yell',
	           null,
	           InputOption::VALUE_NONE,
	           'If set, the task will yell in uppercase letters'
	        )
	    ;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
	    $path = $input->getArgument('path');
	    if ($name) {
	        $text = 'Hello '.$name;
	    } else {
	        $text = 'Hello';
	    }

	    if ($input->getOption('yell')) {
	        $text = strtoupper($text);
	    }

	    $output->writeln($text);
	}

}