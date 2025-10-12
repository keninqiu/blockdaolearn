<?php
namespace App\Utils;
use OpenAI\Laravel\Facades\OpenAI;

class ChatGPTUtil
{
    public static function rewriteToChinese($text)
    {
        // Send to ChatGPT for rewriting
        $response = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini', // or gpt-4o, gpt-3.5-turbo, etc.
            'messages' => [
                ['role' => 'system', 'content' => 'You are a professional Chinese translator. Rewrite English text into natural Chinese. Keep the meaning but make it fluent.'],
                ['role' => 'user', 'content' => $text],
            ],
        ]);

        $output = $response->choices[0]->message->content;

        return $output;
    }
}