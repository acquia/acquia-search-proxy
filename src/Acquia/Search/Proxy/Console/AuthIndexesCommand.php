<?php

namespace Acquia\Search\Proxy\Console;

use Acquia\Common\AcquiaServiceManager;
use Acquia\Common\Services;
use Acquia\Network\AcquiaNetworkClient;
use Acquia\Search\AcquiaSearchService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AuthIndexesCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('indexes:auth')
            ->setDescription('Authenticate Acquia Search indexes associated with a subscription')
            ->addArgument(
                'config-file',
                InputArgument::REQUIRED,
                'Path to the .json that will store the index credentials'
            )
            ->addOption(
               'identifer',
               null,
               InputOption::VALUE_REQUIRED,
               'The subscription\'s Acquia Network identifier, e.g. ABCD-12345'
            )
            ->addOption(
               'key',
               null,
               InputOption::VALUE_REQUIRED,
               'The subscription\'s Acquia Network key'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $configFile = $input->getArgument('config-file');
        if (pathinfo($configFile, PATHINFO_EXTENSION) != 'json') {
            throw new \InvalidArgumentException('Configuration file must be a JSON document');
        }

        $dialog = $this->getHelperSet()->get('dialog');
        if (!$identifier = $input->getOption('identifer')) {
            $identifier = $dialog->ask($output, 'Acquia Network Identifier: ');
        }
        if (!$key = $input->getOption('key')) {
            $key = $dialog->ask($output, 'Acquia Network Key: ');
        }

        $network = AcquiaNetworkClient::factory(array(
            'network_id'  => $identifier,
            'network_key' => $key,
        ));

        $acquiaServices = Services::ACQUIA_SEARCH;
        $subscription = $network->checkSubscription($acquiaServices);
        $search = AcquiaSearchService::factory($subscription);

        $services = new AcquiaServiceManager(array(
            'conf_dir' => dirname($configFile),
        ));

        $group = basename($configFile, '.json');
        $services->setBuilder($group, $search);
        $services->save();
    }
}
