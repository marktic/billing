<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class BillingPartiesUniqueIndex extends AbstractMigration
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
        $table_name = 'mkt_billing_parties';
        $table = $this->table($table_name);
        $table
            ->removeIndex(['owner_id', 'owner', 'identification'])
            ->addIndex(['owner_id', 'owner', 'subject_id', 'subject', 'identification'], ['unique' => true])
            ->save();
    }
}
