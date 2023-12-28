<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class BillingStatusesTable extends AbstractMigration
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
        $table_name = 'mkt_billing_billing_statuses';
        $exists = $this->hasTable($table_name);
        if ($exists) {
            return;
        }
        $table = $this->table($table_name);
        $table
            ->addColumn('subject_id', 'integer', ['null' => true])
            ->addColumn('subject', 'string', ['null' => true])
            ->addColumn(
                'status',
                'enum',
                [
                    'null' => false,
                    'values' => ['pending', 'billable', 'billed', 'failed', 'completed', 'nonbillable', 'discount', 'trial', 'ignored'],
                ])
            ->addColumn('amount', 'integer', ['null' => true, 'signed' => false])
            ->addColumn('amount_billed', 'integer', ['null' => true, 'signed' => false])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ]);

        $table
            ->addIndex(['subject_id', 'subject'])
            ->addIndex(['status'])
            ->save();

    }
}
