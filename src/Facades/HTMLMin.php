<?php

/*
 * This file is part of Laravel HTMLMin.
 *
 * (c) Kenan Gündoğan <https://github.com/kenangundogan>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HTMLMin\HTMLMin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the htmlmin facade class.
 *
 * @author Kenan Gündoğan <https://github.com/kenangundogan>
 */
class HTMLMin extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'htmlmin';
    }
}
