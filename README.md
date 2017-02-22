# action-log
操作日志自动记录


## Installation

## Demo
自动记录操作日志（自动记录增、删、改操作）

```php

use dongm2ez\ActionLog\Models\ModelAfterTrait

class UserModel extends Model{

  use modelAfterTrait;

}

```

主动记录操作日志

```php

use ActionLog

\dongm2ez\ActionLog\Repositories\ActionLogRepository::createActionLog($type,$content);

```
