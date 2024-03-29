<?php
namespace Sale\Customapi\Api;

interface CustomerGreetingInterface
{
   /**
    * Get customer's name by Customer ID and return greeting message.
    *
    * @api
    * @param int $customerId
    * @return \Magento\Customer\Api\Data\CustomerInterface
    * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
    * @throws \Magento\Framework\Exception\LocalizedException
    */
   public function sayHello($customerId);

}