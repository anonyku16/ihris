<?php

namespace App\Models;

use Silber\Bouncer\Database\Role as BouncerRole;
use Silber\Bouncer\Database\Concerns\IsRole;

class Role extends BouncerRole
{
    use IsRole;

    protected $fillable = ['name', 'title', 'description', 'icon'];
}
