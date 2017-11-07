<?php
namespace AVEFileBundle\Command;

use AVEFileBundle\Facade\FileFacade;
use AVEFileBundle\Entity\File;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class FileListCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('ave:file:list')
            ->setDescription('Вывести список файлов каталога')
            ->addOption('path', null, InputOption::VALUE_OPTIONAL, 'Путь к кталогу',
                '.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $input->getOption('path');

        /**
         * @var FileFacade
         */
        $fileFacade = $this->getContainer()->get(FileFacade::getServiceName());

        $files = $fileFacade->listPath($path, 'php', 10);

        foreach ($files as $file) {
            /**
             * @var File $file
             */
            $output->writeln('['.$file->getPath().'] - '.$file->getName());
        }
    }
}