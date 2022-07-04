<?php
namespace Sale\Yesno\Observer;

class AddOrderCommentsToOrder implements \Magento\Framework\Event\ObserverInterface
{
    protected $logger;
    protected $objectCopyService;
    private $quoteRepository;
   

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\DataObject\Copy $objectCopyService,
        \Magento\Quote\Model\QuoteRepository $quoteRepository
    )
    {
        $this->logger = $logger;
        $this->objectCopyService = $objectCopyService;
        $this->quoteRepository = $quoteRepository;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();
        $quotes = $this->quoteRepository->get($order->getQuoteId());
        if ($quotes->getYesno()) {
            $order->setYesno($quotes->getYesno());
        }
        return $this;
    }
}
