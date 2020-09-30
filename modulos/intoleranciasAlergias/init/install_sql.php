<?php

$sql = array();
$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'intolerance_allergy`(
            `id` int(10) unsigned NOT NULL auto_increment,
            `intolerance_allergy` varchar(50) NOT NULL,
            PRIMARY KEY (`id_product`, `id_lang`, `id_shop` , `id_intolerance_allergy` )
        )ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';



$sql[] = "INSERT INTO `intolerance_allergy` (`id`, `intolerance_allergy`) VALUES
        (1, 'Bajo en Sodio'),
        (2, 'Sin frutos secos'),
        (3, 'Sin levaduras)'),
        (4, 'Bio'),
        (5, 'Sin Gluten'),
        (6, 'Sin pescado/marisco'),
        (7, 'Colación'),
        (8, 'Sin huevo'),
        (9, 'Sin soya'),
        (10, 'Hipoalergénico'),
        (11, 'Sin lactosa'),
        (12, 'Sin sulfitos'),
        (13, 'orgánico'),
        (14, 'Sin leche'),
        (15, 'Sin trigo'),
        (16, 'Sin azucar'),
        (17, 'Sin legumbres'),
        (18, 'Vegano');";

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'product_intolerance_allergy`(
            `id_product` int(10) unsigned NOT NULL auto_increment,
            `id_lang` int(10) unsigned NOT NULL,
            `id_shop` int(10) unsigned NOT NULL,
            `id_intolerance_allergy` int(10) unsigned NOT NULL,
            PRIMARY KEY (`id_product`, `id_lang`, `id_shop` , `id_intolerance_allergy` )
        )ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';