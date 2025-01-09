<?php

namespace App\Helpers;

class HelperCustom
{
    public static function convertMarkdownToHtml($content)
    {
        // Convert Markdown images to responsive HTML <img> tags
        $content = preg_replace(
            '/!\[(.*?)\]\((.*?)\)/',
            '<img style="max-width: 100%; height: auto; display: block; margin: 10px 0; object-fit: contain;" src="$2" alt="$1" />',
            $content
        );

        // Convert Markdown links to styled HTML <a> tags
        $content = preg_replace(
            '/\[(.*?)\]\((.*?)\)/',
            '<a href="$2" style="color: #1a73e8; text-decoration: none;">$1</a>',
            $content
        );

        // Convert bold text to <strong> with styling
        $content = preg_replace(
            '/\*\*(.*?)\*\*/',
            '<strong style="font-weight: bold;">$1</strong>',
            $content
        );

        // Convert italic text to <em> with styling
        $content = preg_replace(
            '/\*(.*?)\*/',
            '<em style="font-style: italic;">$1</em>',
            $content
        );

        // Convert strikethrough text to <del> with spacing
        $content = preg_replace(
            '/~~(.*?)~~/',
            '<del style="text-decoration: line-through; margin: 0 5px;">$1</del>',
            $content
        );

        // Convert blockquotes to styled <blockquote>
        $content = preg_replace(
            '/>\s?(.*)/',
            '<blockquote style="border-left: 4px solid #ccc; padding-left: 10px; color: #555; margin: 10px 0;">$1</blockquote>',
            $content
        );

        // Convert unordered lists to <ul> with spacing
        $content = preg_replace('/^\*\s(.*)$/m', '<ul style="padding-left: 20px; margin: 10px 0;"><li>$1</li></ul>', $content);
        $content = preg_replace('/<\/ul>\s*<ul>/', '', $content); // Merge consecutive <ul>

        // Convert ordered lists to <ol> with spacing
        $content = preg_replace('/^\d+\.\s(.*)$/m', '<ol style="padding-left: 20px; margin: 10px 0;"><li>$1</li></ol>', $content);
        $content = preg_replace('/<\/ol>\s*<ol>/', '', $content); // Merge consecutive <ol>

        return $content;
    }
}
