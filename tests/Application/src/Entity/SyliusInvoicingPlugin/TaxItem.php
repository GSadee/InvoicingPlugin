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
use Sylius\InvoicingPlugin\Entity\TaxItem as BaseTaxItem;

/**
 * @ORM\Entity()
 * @ORM\Table(name="sylius_invoicing_plugin_tax_item")
 */
class TaxItem extends BaseTaxItem implements TaxItemInterface
{
}
