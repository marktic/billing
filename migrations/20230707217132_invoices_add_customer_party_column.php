<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InvoicesAddCustomerPartyColumn extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table_name = 'mkt_billing_invoices';
        $table = $this->table($table_name);
        $table
            ->addColumn(
                'customer_party_id',
                'integer',
                ['null' => true, 'after' => 'subject', 'signed' => false]
            )
            ->addIndex(['customer_party_id'])
            ->save();

        $table
            ->addForeignKey(
                'customer_party_id',
                'mkt_billing_parties',
                'id',
                ['constraint' => 'mkt_billing_parties_customer_party_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->save();
    }
}
