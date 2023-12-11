<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class BillingExternalCommunicationsTable extends AbstractMigration
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
        $table_name = 'mkt_billing_external_communications';
        $exists = $this->hasTable($table_name);
        if ($exists) {
            return;
        }
        $table = $this->table($table_name);
        $table
            ->addColumn('subject_id', 'integer', ['null' => true])
            ->addColumn('subject', 'string', ['null' => true])
            ->addColumn('destination', 'string', ['null' => false])
            ->addColumn('status', 'string', ['null' => false])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ]);

        $table
            ->addIndex(['subject_id', 'subject'])
            ->addIndex(['destination'])
            ->addIndex(['status'])
            ->save();

    }
}
