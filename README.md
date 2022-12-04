# Le Refuge

## Presentation

Animal shelter presentation and management site.

## Getting Started

### Prerequisites

1. PHP >= 8.1
2. Check Symfony CLI is installed
3. Check composer is installed
4. Check yarn & node are installed

### Install

1. Clone this project
```bash
git clone git@github.com:Anthony-AGTN/le-refuge.git
```
2. Install dependencies with `composer`
```bash
composer install
```
3. Install dependencies with `yarn`
```bash
yarn install
```
4. Duplicate `photos.fixtures` folder into `photos`
```bash
cp -r ./public/images/photos.fixtures ./public/images/photos
```
5. Build assets
```bash
yarn encore dev
```
6. Duplicate file `.env` in `.env.local`
```bash
cp ./.env ./.env.local
```
7. In `.env.local`, fill in the information for the database
```bash
# DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7&charset=utf8mb4"
```
8. Run commands to generate the database
```bash
symfony console doctrine:database:create
symfony console doctrine:migrations:migrate
symfony console doctrine:fixtures:load
```

### Working

1. Launch your local php web server
```bash
symfony server:start
```
2. Launch your local server for assets
```bash
yarn run dev --watch
yarn dev-server # With Hot Module Reload activated
```
## Authors

- [@Anthony Gouton](https://github.com/Anthony-AGTN)
