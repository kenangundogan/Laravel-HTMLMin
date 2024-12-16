<?php

/*
 * This file is part of Laravel HTMLMin.
 *
 * (c) Kenan Gündoğan <https://github.com/kenangundogan>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HTMLMin\HTMLMin\Minifiers;

/**
 * This is the minifier interface.
 *
 * @author Kenan Gündoğan <https://github.com/kenangundogan>
 */
interface MinifierInterface
{
    /**
     * Get the minified value.
     *
     * @param string $value
     *
     * @return string
     */
    public function render($value);
}
