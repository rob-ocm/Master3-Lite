<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

?>

<form action="<?php echo Route::_('index.php', true, $params->get('usesecure', 0)); ?>" method="post" id="login-form">
    
    <?php if ($params->get('greeting', 1)) { ?>
    <div class="uk-form-label uk-text-uppercase">
        <?php echo Text::sprintf('MOD_LOGIN_HINAME', htmlspecialchars($user->get(!$params->get('name', 0) ? 'name' : 'username'), ENT_COMPAT, 'UTF-8')); ?>
    </div>
    <?php } ?>

    <?php if ($params->get('profilelink', 0)) { ?>
    <ul class="uk-list uk-margin-top">
        <li>
            <a href="<?php echo Route::_('index.php?option=com_users&view=profile'); ?>">
                <?php echo Text::_('MOD_LOGIN_PROFILE'); ?>
            </a>
        </li>
    </ul>
    <?php } ?>

    <div class="uk-margin-top">
        <button type="submit" name="Submit" class="uk-button uk-button-primary uk-button-small"><?php echo Text::_('JLOGOUT'); ?></button>
    </div>

    <input type="hidden" name="option" value="com_users" />
    <input type="hidden" name="task" value="user.logout" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    <?php echo HTMLHelper::_('form.token'); ?>

</form>
