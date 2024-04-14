<?php

namespace App\pagination;

use App\request\CommandReader;

class PaginatorView
{
    private array $book;
    private int $perPage;
    private int $currentPage;

    public function __construct(int $perPage, int $currentPage)
    {
        $this->perPage = $perPage;
        $this->currentPage = $currentPage;
        $this->paginate();
    }

    private function paginate(): void
    {
        $CommandReader = new CommandReader();
        $items = $CommandReader->getResults();

        $paginationData = Paginator::paginate($items, $this->perPage, $this->currentPage);

        $this->book = $paginationData['items'];

        $this->renderTable($paginationData);
    }

    private function renderTable(array $paginationData): void
    {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Inbo Task 1</title>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                
                th, td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: left;
                }
            </style>
        </head>
        <body>
            <h2>Books</h2>
            <table>
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Pages</th>
                        <th>Publish Date</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($paginationData['items'] as $book) {
            echo '
                    <tr>
                        <td>' . $book['ISBN'] . '</td>
                        <td>' . $book['bookTitle'] . '</td>
                        <td>' . $book['authorName'] . '</td>
                        <td>' . $book['pagesCount'] . '</td>
                        <td>' . $book['publishDate'] . '</td>
                    </tr>';
        }

        echo '
                </tbody>
            </table>';


        if ($paginationData['endIndex'] < $paginationData['totalItems'] - 1) {
            echo '<a href="?page=' . ($paginationData['currentPage'] + 1) . '">Next</a><br>';
        }
        if ($paginationData['currentPage'] > 1) {
            echo '<a href="?page=' . ($paginationData['currentPage'] - 1) . '">Previous</a>';
        }

        echo '
        </body>
        </html>';
    }
}