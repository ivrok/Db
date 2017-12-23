# Db
This classes gives tools for comfotable working with mysql queries.


```
//create table users
$table = new Db\SM\SMTable();
$table->create()->tabname('users')
  ->column('id')->int()->autoincrement()->notNull()->finish()
  ->column('name')->varchar(50)->notNull()->finish()
  ->column('phone')->varchar(15)->notNull()->finish()
  ->column('role')->tinyint()->notNull()->finish()
  ->index('id')->primary()->finish()
  ->index('phone')->unique()->finish()
  ->innodb();
\Db\Db::instance()->execute($table);

//insert new user into table users
\Db\Db::instance()->execute((new \Db\SM\SMInsert())->into('users')
  ->keyVal('name', 'admin')
  ->keyVal('phone', ADMIN_PHONE)
  ->keyVal('role', 1)
);

//select rows from table users
\Db\Db::instance()->execute((new \Db\SM\SMSelect('*'))->from('users', 'u')->join('LEFT', 'roles', 'r', 'r.id = u.role'));
```
