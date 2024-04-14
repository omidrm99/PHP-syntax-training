<?php

namespace App\pagination;

class Paginator
{
    public static function paginate($items, $perPage, $page): array
    {
        $totalItems = count($items);
        $startIndex = ($page - 1) * $perPage;
        $endIndex = min($startIndex + $perPage - 1, $totalItems - 1);
        $pagedItems = array_slice($items, $startIndex, $perPage);

        return [
            'items' => $pagedItems,
            'startIndex' => $startIndex,
            'endIndex' => $endIndex,
            'totalItems' => $totalItems,
            'currentPage' => $page,
            'perPage' => $perPage,
        ];
    }
}