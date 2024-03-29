<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class BillingInvoicesTable extends AbstractMigration
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
        $exists = $this->hasTable($table_name);
        if ($exists) {
            return;
        }
        $table = $this->table($table_name);
        $table
            ->addColumn('owner_id', 'integer', ['null' => false])
            ->addColumn('owner', 'string', ['null' => true])
            ->addColumn('subject_id', 'integer', ['null' => true])
            ->addColumn('subject', 'string', ['null' => true])
            ->addColumn('number', 'string', ['null' => true, 'limit' => 50])
            ->addColumn('series', 'string', ['null' => true, 'limit' => 50])
            ->addColumn('currency', 'string', ['null' => true, 'limit' => 3])
            ->addColumn('amount', 'integer', ['null' => true, 'signed' => false])
            ->addColumn('amount_paid', 'integer', ['null' => true, 'signed' => false])
            ->addColumn('status', 'enum', ['null' => true, 'values' => ['draft', 'issued', 'paid', 'partially_paid', 'overdue', 'voided']])
            ->addColumn('issued_at', 'date', ['null' => true])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ]);


        $table
            ->addIndex(['owner_id'])
            ->addIndex(['owner']);

        $table->save();
    }
}
