<?php
use Migrations\AbstractMigration;

class AddUserFieldsToApplications extends AbstractMigration
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
        $table = $this->table('applicants');
        $table->addColumn('first_name', 'string', ['limit' => 30, 'null' => false])
              ->addColumn('last_name', 'string', ['limit' => 30, 'null' => false])
              ->addColumn('common_name', 'string', ['limit' => 30, 'null' => false]);

        $table->update();
    }
}
