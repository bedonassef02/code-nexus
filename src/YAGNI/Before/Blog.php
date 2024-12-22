<?php declare(strict_types=1);

namespace App\YAGNI\Before;

class Blog
{
    public function __construct(
        private mixed $database,
        private mixed $mailer,
        private mixed $seoService,
        private mixed $formatter
    ) { }

    public function createPost(
        array $data
    ): void {
        if (empty($data['title']) || empty($data['content']))
            throw new \Exception('Title and content are required.');

        if ($this->postExists($data['title']))
            throw new \Exception('A post with this title already exists.');

        $formattedContent = $this->formatter->formatContent($data['content']);

        $seoData = $this->seoService->optimizeForSEO(
            $data['title'],
            $data['content']
        );

        $this->savePost(
            $data['title'],
            $formattedContent,
            $seoData
        );

        $this->mailer->send(
            $data['author_email'],
            'New Blog Post Created',
            'Your post has been successfully created.'
        );

        $this->assignCategories($data['categories']);
        $this->assignTags($data['tags']);

        if (!empty($data['publish_at']))
            $this->schedulePost($data['publish_at']);
    }

    private function postExists(
        string $title
    ): bool {
        return false;
    }

    private function savePost(
        string $title,
        string $content,
        string $seoData
    ) {
        // Save the blog post to the database
    }

    private function assignCategories(
        array $categories
    ): void {
        // Assign categories to the post
    }

    private function assignTags(
        array $tags
    ): void {
        // Assign tags to the post
    }

    private function schedulePost(
        string $publishAt
    ): void {
        // Schedule the post to be published at a later date
    }
}