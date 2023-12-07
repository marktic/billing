<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class BillingPartiesTable extends AbstractMigration
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
            ->addColumn('identification', 'string', ['null' => false])
            ->addColumn('name', 'string', ['null' => false])
            ->addColumn('legal_entity_id', 'integer', ['null' => true])
            ->addColumn('contact_id', 'string', ['null' => true])
            ->addColumn('postal_address_id', 'string', ['null' => true])
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
            ->addIndex(['subject_id', 'subject'])
            ->addIndex(['identification'])
            ->addIndex(['owner_id', 'owner', 'identification'], ['unique' => true])
            ->save();

        $table
            ->addForeignKey(
                'legal_entity_id',
                'mkt_billing_legal_entities',
                'id',
                ['constraint' => 'mkt_billing_legal_entities_legal_entity_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->addForeignKey(
                'contact_id',
                'mkt_billing_contacts',
                'id',
                ['constraint' => 'mkt_billing_contacts_legal_contact_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->addForeignKey(
                'postal_address_id',
                'mkt_billing_postal_addresses',
                'id',
                ['constraint' => 'mkt_billing_postal_addresses_postal_address_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->save();
    }
}
