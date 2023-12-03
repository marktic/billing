<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class BillingPostalAddressesTable extends AbstractMigration
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
        $table_name = 'mkt_billing_postal_addresses';
        $exists = $this->hasTable($table_name);
        if ($exists) {
            return;
        }
        $table = $this->table($table_name);
        $table
            ->addColumn('owner_id', 'integer', ['null' => true])
            ->addColumn('owner', 'string', ['null' => true])
            ->addColumn('identification', 'string', ['null' => false])
            ->addColumn('street_name', 'string', ['null' => false])
            ->addColumn('additional_street_name', 'string', ['null' => false])
            ->addColumn('building_number', 'string', ['null' => false])
            ->addColumn('city_name', 'string', ['null' => false])
            ->addColumn('postal_zone', 'string', ['null' => false])
            ->addColumn('country_subentity', 'string', ['null' => false])
            ->addColumn('country', 'string', ['null' => false, 'length' => 2])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ]);

        $table
            ->addIndex(['owner_id'])
            ->addIndex(['owner'])
            ->addIndex(['owner_id', 'owner', 'identification'], ['unique' => true]);


        $table->save();
    }
}
