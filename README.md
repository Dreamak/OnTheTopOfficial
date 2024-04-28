post-it

make model and migration
php artisan make:model User -m
php artisan make:model Event -m
php artisan make:model Guild_war -m
php artisan make:model Guild -m
php artisan make:model Member -m
php artisan make:model Password -m
php artisan make:model Power -m
php artisan make:model Result_1 -m
php artisan make:model Result_2 -m
php artisan make:model Result_3 -m
php artisan make:model Role -m

Seeder
php artisan make:seeder RolesTableSeeder
php artisan make:seeder UsersTableSeeder
php artisan make:seeder MembersTableSeeder
php artisan make:seeder PowersTableSeeder
php artisan make:seeder GuildsTableSeeder
php artisan make:seeder GuildWarsTableSeeder
php artisan make:seeder PasswordsTableSeeder
php artisan make:seeder Result1TableSeeder
php artisan make:seeder Result2TableSeeder
php artisan make:seeder Result3TableSeeder
php artisan make:seeder EventsTableSeeder


php artisan db:seed --class=RolesTableSeeder
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=MembersTableSeeder
php artisan db:seed --class=PowersTableSeeder
php artisan db:seed --class=GuildsTableSeeder
php artisan db:seed --class=GuildWarsTableSeeder
php artisan db:seed --class=PasswordsTableSeeder
php artisan db:seed --class=Result1TableSeeder
php artisan db:seed --class=Result2TableSeeder
php artisan db:seed --class=Result3TableSeeder
php artisan db:seed --class=EventsTableSeeder



php artisan db:seed --class=PasswordsTableSeeder
php artisan db:seed --class=PowersTableSeeder
php artisan db:seed --class=GuildsTableSeeder
php artisan db:seed --class=RolesTableSeeder
php artisan db:seed --class=MembersTableSeeder
php artisan db:seed --class=UsersTableSeeder

php artisan db:seed --class=GuildWarsTableSeeder
php artisan db:seed --class=Result1TableSeeder
php artisan db:seed --class=Result2TableSeeder
php artisan db:seed --class=Result3TableSeeder
php artisan db:seed --class=EventsTableSeeder






