<?php declare(strict_types=1);

namespace App\YAGNI\After;

class Blog
{
    public function __construct(
        private mixed $database,
        private mixed $mailer
    ) { }

    public function createPost(
        array $data
    ): void {
        if (empty($data['title']) || empty($data['content']))
            throw new \Exception('Title and content are required.');

        if ($this->postExists($data['title']))
            throw new \Exception('A post with this title already exists.');

        $this->savePost($data['title'], $data['content']);

        $this->mailer->send(
            $data['author_email'],
            'New Blog Post Created',
            'Your post has been successfully created.'
        );
    }

    private function postExists(
        string $title
    ): bool {
        return false;
    }

    private function savePost(
        string $title,
        string $content
    ): void {
        // Save the blog post to the database
    }
}