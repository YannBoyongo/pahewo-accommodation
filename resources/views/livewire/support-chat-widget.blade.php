<div x-data="{ open: false }" class="fixed bottom-6 right-6 z-50">
    <div x-show="open" x-cloak x-transition
        class="mb-4 flex h-[28rem] w-[22rem] max-w-[calc(100vw-3rem)] flex-col overflow-hidden rounded-2xl bg-white shadow-2xl ring-1 ring-chocolate-100">
        <div class="flex items-center justify-between bg-chocolate-900 px-5 py-4">
            <div>
                <p class="text-sm font-semibold text-white">24/7 Support</p>
                <p class="flex items-center gap-1.5 text-xs text-gold-400">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-green-500"></span>
                    </span>
                    Always online — like our care
                </p>
            </div>
            <button @click="open = false" class="text-white/70 transition hover:text-white" aria-label="Close chat">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="flex-1 space-y-3 overflow-y-auto bg-beige p-4" id="chat-scroll">
            @foreach ($messages as $message)
                <div @class(['flex', 'justify-end' => $message['from'] === 'guest'])>
                    <div @class([
                        'max-w-[85%] rounded-2xl px-4 py-2.5 text-sm leading-relaxed',
                        'bg-white text-neutral-700 shadow-sm' => $message['from'] === 'team',
                        'bg-chocolate-700 text-white' => $message['from'] === 'guest',
                    ])>
                        {{ $message['text'] }}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="border-t border-chocolate-100 bg-white p-3">
            <form wire:submit="send" class="flex items-center gap-2">
                <input type="text" wire:model="draft" placeholder="Write a message…"
                    class="flex-1 input-luxe">
                <button type="submit" class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-chocolate-700 text-white transition hover:bg-chocolate-800" aria-label="Send message">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"/></svg>
                </button>
            </form>
            <p class="mt-2 text-center text-[10px] text-neutral-400">
                Urgent wellness support? Call the 24/7 line: +256 800 246 810
            </p>
        </div>
    </div>

    <button @click="open = !open"
        class="ml-auto flex h-14 w-14 items-center justify-center rounded-full bg-chocolate-700 text-white shadow-xl shadow-chocolate-900/30 transition hover:scale-105 hover:bg-chocolate-800"
        aria-label="Open 24/7 support chat">
        <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"/></svg>
        <svg x-show="open" x-cloak class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/></svg>
    </button>
</div>
