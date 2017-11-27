<?php
use Migrations\AbstractMigration;

class CreateMovies extends AbstractMigration
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
        $table = $this->table('movies');
        $table->addColumn('hall_id', 'integer')
            ->addForeignKey('hall_id', 'halls', 'id');
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 32,
            'null' => false,
        ]);
        $table->addColumn('start_time', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('end_time', 'datetime', [
            'default' => null,
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
