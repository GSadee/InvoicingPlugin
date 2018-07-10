<?php

declare(strict_types=1);

namespace Sylius\InvoicingPlugin\Entity;

interface TaxItemInterface
{
    public function id(): string;

    public function invoice(): InvoiceInterface;

    public function setInvoice(InvoiceInterface $invoice): void;

    public function name(): string;

    public function rate(): float;

    public function amount(): int;
}
