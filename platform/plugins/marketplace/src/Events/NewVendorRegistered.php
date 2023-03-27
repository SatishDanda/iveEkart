<?php

namespace Botble\Marketplace\Events;

use Botble\Base\Events\Event;
use Botble\Ecommerce\Models\Customer;
use Illuminate\Queue\SerializesModels;

class NewVendorRegistered extends Event
{
    use SerializesModels;

    public Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
}
