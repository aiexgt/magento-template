<?php
namespace RabbitMQ\Email\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\MessageQueue\PublisherInterface;

class SendEmail extends Command
{
    protected $publisher;

    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('rabbitmq:email:send')
            ->setDescription('Send an email via RabbitMQ');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $message = "This is a test email sent via RabbitMQ.";
        $this->publisher->publish('rabbitmq.email.queue', $message);
        $output->writeln("Email sent to RabbitMQ queue.");

        return 0;
    }
}