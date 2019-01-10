<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $users = $this->table('users');
        $applicants = $this->table('applicants');


        // Clear the table first
        $users->truncate();
        $applicants->truncate();

        $generator = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($generator);
        for ($i = 0; $i < 100; $i++) {
            $firstName = $generator->firstName;
            $lastName = $generator->lastName;
            $populator->addEntity('Users', 1, [
                'email' => function() use ($generator) { return $generator->email; },
                'surname' => function() use ($generator, $lastName) { return $lastName; },
                'given_name' => function() use ($generator, $firstName) { return $firstName; },
                'common_name' => function() use ($generator, $firstName) { return $firstName; }
            ]);
            $populator->addEntity('Applicants', 1, [
                'first_name' => function() use ($generator, $firstName) { return $firstName; },
                'last_name' => function() use ($generator, $lastName) { return $lastName; },
                'common_name' => function() use ($generator, $firstName, $lastName) { return $firstName . " " . $lastName; },
            ]);
            $populator->execute();
        }
    }
}
