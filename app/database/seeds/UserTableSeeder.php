<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
       // DB::table('users')->delete();


        $users = array(
            array(
                'email'      => 'admin@example.org',
                'username'      => 'admin',
                'password'   => Hash::make('admin123'),
                'activated'   => 1,
                'activation_code' => md5(microtime().Config::get('app.key')),
                'created_at' => '',
                'updated_at' => '',
            )

            /*,
            array(
                'username'      => 'user',
                'email'      => 'user@example.org',
                'password'   => Hash::make('user'),
                'confirmed'   => 1,
                'confirmation_code' => md5(microtime().Config::get('app.key')),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )*/
        );

        DB::table('users')->insert( $users );
    }

}
