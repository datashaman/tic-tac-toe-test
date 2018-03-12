dummy:

recreate-database:
	mysqladmin drop -u$(DB_USERNAME) -p$(DB_PASSWORD) $(DB_DATABASE)
	mysqladmin create -u$(DB_USERNAME) -p$(DB_PASSWORD) $(DB_DATABASE)
	php artisan migrate:refresh --seed

db-seed:
	php artisan db:seed

db-client:
	mysql -u$(DB_USERNAME) -p$(DB_PASSWORD) $(DB_DATABASE)
