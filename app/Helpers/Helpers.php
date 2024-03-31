<?php

if (!function_exists('getCategoryName')) {
    function getCategoryName($categoryId) {
        switch ($categoryId) {
            case 1:
                return 'Instansi Pemerintahan';
            case 2:
                return 'Lembaga Swadaya Masyarakat';
            case 3:
                return 'Perusahaan Swasta';
            case 4:
                return 'Freelancer';
            default:
                return 'Unknown Category';
        }
    }
}
