<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/6/6
 */

namespace Bower\Traits;

trait Apcu
{
    protected function apcuGet($key)
    {
        return apcu_fetch($key);
    }

    protected function apcuSet($key, $value, $expire = 0)
    {
        if ($this->apcuHas($key)) {
            return apcu_store($key, $value, $expire);
        }
        return apcu_add($key, $value, $expire);
    }

    protected function apcuExpire($key, $expire = 0)
    {
        $value = $this->apcuGet($key);
        if ($value !== false) {
            return $this->apcuSet($key, $this->apcuGet($key), $expire);
        } else {
            return false;
        }
    }

    protected function apcuHas($key)
    {
        return apcu_exists($key);
    }

    protected function apcuDel($key)
    {
        return apcu_delete($key);
    }

    protected function apcuClean()
    {
        return apcu_clear_cache();
    }

}