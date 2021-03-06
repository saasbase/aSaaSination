<?php

namespace Core\Abstracts;

/**
 * Class MongoModel.
 *
 * @mixin \Eloquent
 */
abstract class Model extends \Illuminate\Database\Eloquent\Model
{
    protected $connection = 'mysql';
}
