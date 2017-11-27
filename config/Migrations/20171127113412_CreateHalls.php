<?php
use Migrations\AbstractMigration;

class CreateHalls extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('halls');
        $table->addColumn('cinema_id', 'integer')
            ->addForeignKey('cinema_id', 'cinemas', 'id');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 32,
            'null' => false,
        ]);
        $table->addColumn('rows', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('seats', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
