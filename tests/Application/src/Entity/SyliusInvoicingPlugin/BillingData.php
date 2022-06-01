<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Sylius\InvoicingPlugin\Application\Entity\SyliusInvoicingPlugin;

use Doctrine\ORM\Mapping as ORM;
use Sylius\InvoicingPlugin\Entity\BillingData as BaseBillingData;

/**
 * @ORM\Entity()
 * @ORM\Table(name="sylius_invoicing_plugin_billing_data")
 */
class BillingData extends BaseBillingData implements BillingDataInterface
{
}
