<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace ShortCodeMeta;

use Propel\Runtime\Connection\ConnectionInterface;
use ShortCode\ShortCode;
use Thelia\Module\BaseModule;

class ShortCodeMeta extends BaseModule
{
    public static $IS_EMPTY_PAGE = false;

    public static $PREV_PAGE_URL = null;
    public static $NEXT_PAGE_URL = null;

    /** @var string */
    const DOMAIN_NAME = 'shortcodemeta';

    const EMPTY_PAGE_META_SHORT_CODE = 'meta_short_code_empty_page';
    const PAGINATION_META_SHORT_CODE = 'meta_short_code_pagination';

    public static function setStatic($name) {
        return self::$$name;
    }

    public function postActivation(ConnectionInterface $con = null): void
    {
        ShortCode::createNewShortCodeIfNotExist(self::EMPTY_PAGE_META_SHORT_CODE, self::EMPTY_PAGE_META_SHORT_CODE);
        ShortCode::createNewShortCodeIfNotExist(self::PAGINATION_META_SHORT_CODE, self::PAGINATION_META_SHORT_CODE);
    }
}
