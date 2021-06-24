## Installation
```bash
composer require xooooooox/model
``` 

## For example
```php
<?php


namespace app\model;


use xooooooox\model\Helper;


/**
 * Class Model
 * @package app\model
 */
class Model extends Helper {

}

/**
 * Table Model
 * Class User
 * @package app\model
 */
class User extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
    
    public function Test(){
        $this->AddOne(['name'=>'Jack']);
        $this->DelOne(1);
        $this->ModOne(1,['name'=>'Tom']);
        $this->AscFirst(1);
        $this->DescFirst(1,['name']);
        $this->Exists(1);
    }
    
}

```
