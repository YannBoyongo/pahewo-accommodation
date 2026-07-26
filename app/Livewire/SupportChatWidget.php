<?php

namespace App\Livewire;

use App\Models\Setting;
use Livewire\Component;

class SupportChatWidget extends Component
{
    public function render()
    {
        $settings = Setting::instance();
        $phone = preg_replace('/\D+/', '', $settings->whatsapp_number ?: $settings->phone) ?? '';

        return view('livewire.support-chat-widget', [
            'whatsappUrl' => 'https://wa.me/'.$phone.'?text='.rawurlencode('Hello, I would like more information about Endo Wellness Accommodation.'),
        ]);
    }
}
