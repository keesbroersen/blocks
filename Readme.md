# Features

- wp-config.php settings based on .env
- Linting: eslint + prettier + psr2
- Livereload for css & javascript
- 1 (recent) versie van jquery includen (al is het alleen maar om van de `JQMIGRATE: Migrate is installed` melding af te komen )
- 3rd party code outside git (Like plugins and wordpress-core).
- ACF with [Local JSON](https://www.advancedcustomfields.com/resources/local-json/)
- Proxy requests to missing uploads to the staging/production server.

# Installation

## Step 1

Requires [composer](https://getcomposer.org) and the [WP-CLI](https://wp-cli.org/) installed.

Run `yarn && yarn wp-install`

## Step 2

Setup the <VirtualHost>, create the database and save the credentials in the `.env` file.

## Step 3

```sh
wp core install --url="http://wordpress.localhost" --title="My First Blog" --admin_email="info@example.com" --admin_user="admin"
```

Copy the admin password for later.

## Step 4

```sh
wp plugin delete hello
wp theme activate noprotocol
wp theme delete twentyfifteen
wp theme delete twentysixteen
wp theme delete twentyseventeen
chmod -R a+w wp-content/themes/noprotocol/acf-json
```

Done, go to /wp-admin/ and login with the credentional from step 3.

### .htaccess doesn't work on your server?

Enable the render_dist.php in your `wp-config.php`.
Or for better performance: copy the files in dist/ to the document-root folder in a deployment-step.

# Installing updates

```sh
yarn wp-update
```

# Running development environment

```
yarn dev
```

# Build for production environment

```
yarn build
```

# .env

Uses a .env like [Laravel](https://laravel.com/) it even uses the laravel configuration conventions:

---

| Name              | Default                      | Description                                                                  |
| ----------------- | ---------------------------- | ---------------------------------------------------------------------------- |
| APP_DEBUG         | false                        | Setting to `true` enables the php notices, warnings, etc.                    |
| APP_URL           | Uses siteurl from wp_options | Sets the WP_SITEURL & WP_HOME values, with schema and without trailing slash |
| DB_DATABASE       | -                            |
| DB_USERNAME       | -                            |
| DB_PASSWORD       | -                            |
| DB_HOST           | localhost                    | Database hostname (defaults to localhost)                                    |
| DB_PORT           | 3306                         | Database port (defaults to 3306)                                             |
| UPLOADS_PROXY_URL |                              | Fetch missing wp-content/uploads/ files from staging/production.             |
