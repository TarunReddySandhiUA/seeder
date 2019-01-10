<?php
use Migrations\AbstractMigration;

class CreateApplicants extends AbstractMigration
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
        $table->addColumn('user_id', 'integer', ['limit' => 11]);
        $table->addIndex('user_id', ['unique' => true]);
        $table->create();
    }
}
