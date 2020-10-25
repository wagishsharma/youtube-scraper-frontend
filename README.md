# Youtube Scraper Front-end

This is a front-end implementation of YouTube scraper to show trending videos in India using the YouTube Data API. 

Framework used - [CodeIgniter4](https://codeigniter.com/user_guide/intro/index.html)

## Installation

Clone the project to /var/www


```bash
git clone https://github.com/wagishsharma/youtube-scraper-frontend
cd youtube-scraper-frontend
```
create your env file 

``` cp env .env ```

Replace base_url in .env

Grant write permission to youtube-scraper-backend/writable/ directory for storing the cache info

Setup apache config pointing to /public directory of this repository.

```bash
sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/example.com.conf

sudo nano /etc/apache2/sites-available/example.com.conf


```
Your 'example.com.conf' file should look like this 
```

<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/youtube-scraper-frontend/public/
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

```
Enable new config

``` bash
sudo a2ensite example.com.conf
```

Disable default config

```bash
sudo a2dissite 000-default.conf

```

Restart apache
```
sudo systemctl restart apache2

```
or

```bash
sudo service apache2 restart

```


Enable mod_rewrite for routing

```sudo a2enmod rewrite```

You must restart Apache once you make any change to its configuration. To do this, type the command below on a terminal window:

```sudo systemctl restart apache2```

## Usage

Your site is now live on http://{your-ip}/

## Demo

[Click here for demo](http://134.209.144.213/)

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.