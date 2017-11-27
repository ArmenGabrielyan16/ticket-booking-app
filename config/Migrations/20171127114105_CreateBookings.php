<?php
use Migrations\AbstractMigration;

class CreateBookings extends AbstractMigration
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
        $table = $this->table('bookings');
        $table->addColumn('hall_id', 'integer')
            ->addColumn('movie_id', 'integer')
            ->addForeignKey('hall_id', 'halls', 'id')
            ->addForeignKey('movie_id', 'movies', 'id');
        $table->addColumn('row_number', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('seat_number', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('inactive', 'integer');
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
