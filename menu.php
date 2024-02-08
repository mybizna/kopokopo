<?php

/** @var \Modules\Base\Classes\Fetch\Menus $this */

$this->add_module_info("kopokopo", [
    'title' => 'Kopokopo',
    'description' => 'Kopokopo',
    'icon' => 'fas fa-network-wired',
    'path' => '/kopokopo/admin/payment',
    'class_str' => 'text-secondary border-secondary'
]);

$this->add_menu("kopokopo", "payment", "Payment", "/kopokopo/admin/payment", "fas fa-cogs", 5);
$this->add_menu("kopokopo", "stkpush", "Stkpush", "/kopokopo/admin/stkpush", "fas fa-cogs", 5);
$this->add_menu("kopokopo", "gateway", "Gateway", "/kopokopo/admin/gateway", "fas fa-cogs", 5);
$this->add_menu("kopokopo", "pay", "Pay", "/kopokopo/admin/pay", "fas fa-cogs", 5);
$this->add_menu("kopokopo", "webhook", "Webhook", "/kopokopo/admin/webhook", "fas fa-cogs", 5);
$this->add_menu("kopokopo", "Withdraw", "Withdraw", "/kopokopo/admin/Withdraw", "fas fa-cogs", 5);
$this->add_menu("kopokopo", "transaction", "Transaction", "/kopokopo/admin/transaction", "fas fa-cogs", 5);
$this->add_menu("kopokopo", "recipient", "Recipient", "/kopokopo/admin/recipient", "fas fa-cogs", 5);

$this->add_submenu("kopokopo", "recipient", "Mobile", "/kopokopo/admin/recipient_mobile", 5);
$this->add_submenu("kopokopo", "recipient", "Till", "/kopokopo/admin/recipient_till", 5);
$this->add_submenu("kopokopo", "recipient", "Paybill", "/kopokopo/admin/recipient_paybill", 5);
$this->add_submenu("kopokopo", "recipient", "Bank", "/kopokopo/admin/recipient_bank", 5);

$this->add_submenu("kopokopo", "transaction", "B2B", "/kopokopo/admin/transaction_b2b", 5);
$this->add_submenu("kopokopo", "transaction", "Buygood", "/kopokopo/admin/transaction_buygood", 5);
$this->add_submenu("kopokopo", "transaction", "Customer", "/kopokopo/admin/transaction_customer", 5);
$this->add_submenu("kopokopo", "transaction", "M2M", "/kopokopo/admin/transaction_m2m", 5);
$this->add_submenu("kopokopo", "transaction", "merchant", "/kopokopo/admin/transaction_merchant", 5);
$this->add_submenu("kopokopo", "transaction", "Reversal", "/kopokopo/admin/transaction_reversal", 5);
$this->add_submenu("kopokopo", "transaction", "Transfer", "/kopokopo/admin/transaction_transfer", 5);

