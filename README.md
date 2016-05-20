# Database Plugin

A simple Database connection plugin for Boilerplate.

### Important

Although Boilerplate uses `.htaccess` rules to hide config files, since version 2.1.1, you can move your `.config.yml` outside of the public root. It is __highly__ recommend you do this when including sensitive data like database connection details!

### Getting Started

- Grab the repo and place it in the `db` directory.
- Create a database using your manager of choice (e.g. phpMyAdmin).
- In your `.config.yml` set the database credentials:

```yaml
db:
    example:
        username: root
        password: password
        database_name: my_db
```

#### Usage

```php
<?php

// SELECT * FROM 'posts'
$posts = db('example')->select('posts', '*');
print_r($posts);
```

#### Query Syntax
See [Medoo Docs](http://medoo.in/doc) for query syntax.
