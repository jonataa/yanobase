<?php

namespace Yanobase\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Yanobase\FileSystem\Directory;
use Yanobase\FileSystem\File;
use Yanobase\Database\DatabaseFactory;
use Yanobase\Exception;

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
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {       
    $path = $input->getArgument('path');      

    $database = DatabaseFactory::createFromPDO(new \PDO('sqlite::memory:'));    

    $directory = new Directory;
    $filenames = $directory->scan($path);

    $file = new File;   
    $contents = $file->getContents($filenames);

    if (isset($contents) && !empty($contents)) {  
      foreach ($contents as $content) {
        $output->writeln(sprintf('- %s', $content['filename']));
        $affected = $database->exec($content['raw']);
      } 
      $output->writeln('Successfully!');

    }
  } 

}