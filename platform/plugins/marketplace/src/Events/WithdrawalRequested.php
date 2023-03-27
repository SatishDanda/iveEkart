<?php

namespace Botble\Marketplace\Events;

use Botble\Base\Events\Event;
use Botble\Ecommerce\Models\Customer;
use Botble\Marketplace\Models\Withdrawal;
use Illuminate\Queue\SerializesModels;

class WithdrawalRequested extends Event
{
    use SerializesModels;

    public Customer $customer;

    public Withdrawal $withdrawal;

    public function __construct(Customer $customer, Withdrawal $withdrawal)
    {
        $this->customer = $customer;
        $this->withdrawal = $withdrawal;
    }
}
