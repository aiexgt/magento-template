<?php
namespace BackEnd\CliCommand\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleCommand extends Command
{
    /**
     * Configura el comando CLI.
     */
    protected function configure()
    {
        $this->setName('backend:example')
             ->setDescription('Este es un comando CLI de ejemplo.');

        parent::configure();
    }

    /**
     * Ejecuta el comando CLI.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('¡Hola, este es un comando CLI de ejemplo!');
        return 0;
    }
}