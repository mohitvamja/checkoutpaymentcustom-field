<?php

namespace Sale\Customapi\Model\ResourceModel;

use Sale\Customapi\Api\CustomerGreetingInterface;
use Magento\Customer\Model\CustomerRegistry;

class CustomerGreeting implements CustomerGreetingInterface
{
   /**
    * @var CustomerRegistry
    */

   protected $customerRegistry;

   public function __construct(CustomerRegistry $customerRegistry)
   {
       $this->customerRegistry = $customerRegistry;
   }

   /**
    * Get customer's name by Customer ID and return greeting message.
    *
    * @api
    * @param int $customerId
    * @return \Magento\Customer\Api\Data\CustomerInterface
    * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
    * @throws \Magento\Framework\Exception\LocalizedException
    */

   public function sayHello($customerId)
   {
       $customerModel = $this->customerRegistry->retrieve($customerId);
       $name = $customerModel->getDataModel()->getFirstname();
       return "Hello my name is : " .$name;
   }
}