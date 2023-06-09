<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CMain $APPLICATION
 * @var CMain $CurDir
 * @var CSite $arSite
 * @var COption $siteparam_logo_name
 * @var COption $siteparam_logo_description
 * @var COption $siteparam_scripts_head
 * @var COption $siteparam_scripts_body_before
 * @var COption $siteparam_main_logo
 * @var COption $siteparam_main_phone
 * @var COption $siteparam_main_phone_tel
 */
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>">
	<head>
        <title><?php $APPLICATION->ShowTitle(); ?> | <?= $siteparam_logo_name; ?></title>
        <?php
        echo $siteparam_scripts_head;
        use Bitrix\Main\UI\Extension;
        use Bitrix\Main\Page\Asset;
        Extension::load(
            [
                'ui.bootstrap5',
                'ui.fonts.font-awesome',
                'ui.fonts.montserrat',
                'ui.lazysizes',
                'ui.scrollProgress',
            ]
        );
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/main.js');
        $APPLICATION->ShowHead();
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
        <?= $siteparam_scripts_body_before; ?>
        <?php $APPLICATION->ShowPanel(); ?>
        <header class="main-header">
            <nav class="navbar navbar-expand-xl">
                <div class="container-fluid">
                    <a class="main-header__logo logo"
                       title="<?= htmlspecialchars($arSite['SITE_NAME']); ?>"
                        <?php if ($CurDir !== '/'): ?> href="/"<?php endif; ?>>
                        <img src="<?= $siteparam_main_logo; ?>" class="logo__img" width="59" height="53" alt="<?= htmlspecialchars($arSite['SITE_NAME']); ?>">
                        <span class="logo__wrapper">
                            <span class="logo__name"><?= $siteparam_logo_name; ?></span>
                            <span class="logo__description"><?= $siteparam_logo_description; ?></span>
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-expanded="false"
                            data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-label="<?= Loc::getMessage('HEADER_NAVBAR_ARIA_LABEL'); ?>">
                        <span class="navbar-toggler__text"><?= Loc::getMessage('HEADER_NAVBAR_TOGGLER_TEXT'); ?></span>
                        <span class="navbar-toggler__icon"><i class="fa-solid fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mainNavbar">
                        <div class="ms-auto me-auto navbar-wrapper">
                            <?php
                            $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "main_menu",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "main_submenu",
                                    "COMPOSITE_FRAME_MODE" => "A",
                                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "2",
                                    "MENU_CACHE_GET_VARS" => array(
                                    ),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "A",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "main_menu",
                                    "USE_EXT" => "Y",
                                    "COMPONENT_TEMPLATE" => "main_menu"
                                ),
                                false
                            ); ?>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main class="<?php if (use_wide_template($CurDir) === false): ?>main-area<?php else: ?>wide-area<?php endif; ?>">
            <?php if (!($CurDir === '/')): ?>
            <header class="page-header">
                <div class="container">
                    <?php
                    $APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "breadcrumb",
                        Array(
                            "START_FROM" => "0",
                            "PATH" => "",
                            "SITE_ID" => SITE_ID,
                        ),
                        false
                    ); ?>
                    <h1 class="page-header__title"><?php $APPLICATION->ShowTitle(null, false); ?></h1>
                    <?php $APPLICATION->ShowViewContent('MAIN_SUBTITLE'); ?>
                </div>
            </header>
            <?php if (use_wide_template($CurDir) === false): ?>
            <div class="container main-content">
                <?php endif; ?>
                <?php endif; ?>