<?php
use Migrations\AbstractMigration;

class CreateUser extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('email', 'string', ['limit' => 255])
              ->addColumn('surname', 'string', ['null' => false, 'limit' => 255])
              ->addColumn('given_name', 'string', ['null' => true, 'default' => null, 'limit' => 255])
              ->addColumn('common_name', 'string', ['null' => true, 'default' => null, 'limit' => 255]);

        $table->create();
    }
}
