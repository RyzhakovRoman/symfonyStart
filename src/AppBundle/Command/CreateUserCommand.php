<?php
/**
 * Created by PhpStorm.
 * User: Рыжаков
 * Date: 09.10.2017
 * Time: 16:37
 */

namespace AppBundle\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:create-user')
            ->setDescription('Creates a new user')
            ->setHelp('This command allows you to create a user..');

        $this
            ->addArgument('usname', InputArgument::REQUIRED, 'Username of user');
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello!');
        $output->writeln($input->getArgument('usname'));
    }
}