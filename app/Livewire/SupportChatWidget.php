<?php

namespace App\Livewire;

use Livewire\Component;

class SupportChatWidget extends Component
{
    /** @var array<int, array{from: string, text: string}> */
    public array $messages = [];

    public string $draft = '';

    public function mount(): void
    {
        $this->messages = [[
            'from' => 'team',
            'text' => "Hello, you've reached the Stay with Purpose 24/7 line. Whether it's a reservation question or you need the PAHEWO wellness team, we're here — every hour, every day. How can we help?",
        ]];
    }

    public function send(): void
    {
        $text = trim($this->draft);

        if ($text === '') {
            return;
        }

        $this->messages[] = ['from' => 'guest', 'text' => $text];
        $this->messages[] = ['from' => 'team', 'text' => $this->replyFor($text)];
        $this->draft = '';
    }

    private function replyFor(string $text): string
    {
        $text = strtolower($text);

        if (str_contains($text, 'book') || str_contains($text, 'room') || str_contains($text, 'reserv')) {
            return 'Wonderful — you can book directly on our Rooms & Suites page, or call reservations on +256 700 000 000. Every night you stay funds 24/7 endometriosis care.';
        }

        if (str_contains($text, 'endo') || str_contains($text, 'pain') || str_contains($text, 'wellness') || str_contains($text, 'help') || str_contains($text, 'care')) {
            return "For wellness support, the PAHEWO 24/7 care line is +256 800 246 810 — a person answers at any hour, including right now. If it's urgent, please call rather than message. You are not alone.";
        }

        return 'Thank you for your message — a member of our team will reply shortly. For anything urgent, call reservations on +256 700 000 000 or the 24/7 wellness line on +256 800 246 810.';
    }

    public function render()
    {
        return view('livewire.support-chat-widget');
    }
}
