<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class BillingInvoiceLinesTable extends AbstractMigration
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
        $table_name = 'mkt_billing_invoice_lines';
        $exists = $this->hasTable($table_name);
        if ($exists) {
            return;
        }
        $table = $this->table($table_name);
        $table
            ->addColumn('invoice_id', 'integer', ['null' => false])
            ->addColumn('subject_id', 'integer', ['null' => true])
            ->addColumn('subject', 'string', ['null' => true])
            ->addColumn('name', 'string', ['null' => true])
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('quantity', 'integer', ['null' => true])
            ->addColumn('unit_name', 'string', ['null' => true])
            ->addColumn('unit_price', 'integer', ['null' => true, 'signed' => false])
            ->addColumn('subtotal', 'integer', ['null' => true, 'signed' => false])
            ->addColumn('currency', 'string', ['null' => true, 'limit' => 3])
            ->addColumn('tax_rate', 'integer', ['null' => true, 'signed' => false])
            ->addColumn('tax_total', 'integer', ['null' => true, 'signed' => false])
            ->addColumn('total', 'integer', ['null' => true, 'signed' => false])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ]);

        $table
            ->addIndex(['invoice_id'])
            ->save();

        $table
            ->addForeignKey(
                'invoice_id',
                'mkt_billing_invoices',
                'id',
                ['constraint' => 'mkt_billing_invoices_invoice_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->save();
    }
}
