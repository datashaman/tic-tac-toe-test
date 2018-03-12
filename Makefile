dummy:

recreate-database:
	mysqladmin drop -u$(DB_USERNAME) -p$(DB_PASSWORD) $(DB_DATABASE)
	mysqladmin create -u$(DB_USERNAME) -p$(DB_PASSWORD) $(DB_DATABASE)
	php artisan migrate
