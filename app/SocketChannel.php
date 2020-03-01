<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SocketChannel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocketChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocketChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SocketChannel query()
 * @mixin \Eloquent
 */
class SocketChannel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auth_key', 'channel_name', 'active',
    ];
    /**
     * @var mixed
     */
}
