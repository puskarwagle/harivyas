<div class="flex h-screen bg-base-100">
    {{-- User Selection Overlay --}}
    @if(!$currentUser)
    <div class="fixed inset-0 bg-base-100 flex items-center justify-center z-50">
        <div class="text-center space-y-6">
            <h1 class="text-4xl font-bold">💬 Choose User</h1>
            <div class="flex gap-6">
                <button wire:click="loginAs('Amit')" class="btn btn-primary btn-lg">
                    <div class="text-center">
                        <div class="text-2xl mb-2">👨‍💻</div>
                        <div>Amit</div>
                    </div>
                </button>
                <button wire:click="loginAs('Puskar')" class="btn btn-secondary btn-lg">
                    <div class="text-center">
                        <div class="text-2xl mb-2">🧠</div>
                        <div>Puskar</div>
                    </div>
                </button>
            </div>
        </div>
    </div>
    @endif

    {{-- Sidebar: Code Areas --}}
    <div class="w-[60%] bg-base-200 border-r border-base-300 flex flex-col">
        <div class="p-4 border-b border-base-300">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">📦 Code Areas</h2>
                <button wire:click="toggleCodeForm" class="btn btn-lg btn-success">
                    @if($showCodeForm) ✕ @else + @endif
                </button>
            </div>
            
            {{-- Add Code Form --}}
            @if($showCodeForm)
            <div class="space-y-2">
                <input wire:model="newCodeTitle" 
                       placeholder="Code title..." 
                       class="input input-sm input-bordered w-full">
                <textarea wire:model="newCodeContent" 
                          placeholder="Code content..." 
                          class="textarea textarea-sm textarea-bordered w-full h-24"></textarea>
                <button wire:click="sendCode" class="btn btn-sm btn-accent">
                    Save Code
                </button>
            </div>
            @endif
        </div>
        
        {{-- Code List --}}
        <div class="flex-1 overflow-y-auto p-4 space-y-2">
            @foreach($this->codes as $code)
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body p-3">
                    @if($editingCodeId === $code->id)
                        {{-- Edit Mode --}}
                        <input wire:model="editingCodeTitle" 
                               class="input input-xs input-bordered mb-2">
                        <textarea wire:model="editingCodeContent" 
                                  class="textarea textarea-xs textarea-bordered h-20 mb-2"></textarea>
                        <div class="flex gap-1">
                            <button wire:click="updateCode" class="btn btn-lg btn-success">✓</button>
                            <button wire:click="cancelEdit" class="btn btn-lg btn-error">✕</button>
                        </div>
                    @else
                        {{-- View Mode --}}
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="text-sm font-medium truncate">{{ $code->title }}</h4>
                            <div class="flex items-center gap-1">
                                <button onclick="navigator.clipboard.writeText(`{{ addslashes($code->content) }}`)" 
                                        class="btn btn-xs btn-ghost" title="Copy">📋</button>
                                <button onclick="document.getElementById('code-{{ $code->id }}').classList.toggle('hidden')" 
                                        class="btn btn-xs btn-ghost" title="Toggle">👁️</button>
                                @if($code->sender_name === $currentUser)
                                <div class="dropdown dropdown-end">
                                    <label tabindex="0" class="btn btn-xs btn-ghost">⋯</label>
                                    <ul tabindex="0" class="dropdown-content menu p-1 shadow bg-base-100 rounded-box w-32 text-xs">
                                        <li><a wire:click="editCode({{ $code->id }})">Edit</a></li>
                                        <li><a wire:click="deleteCode({{ $code->id }})" class="text-error">Delete</a></li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <pre id="code-{{ $code->id }}" class="text-xs bg-base-200 p-2 rounded overflow-x-auto"><code>{{ $code->content }}</code></pre>
                        <div class="text-xs text-base-content/60 mt-2">
                            {{ $code->sender_name }} • {{ $code->created_at->diffForHumans() }}
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Main Chat Area --}}
    <div class="flex-1 flex flex-col">
        {{-- Top Bar --}}
        <div class="navbar bg-primary text-primary-content">
            <div class="flex-1">
                <span class="text-lg font-semibold">💬 Chat • {{ $currentUser }}</span>
            </div>
            {{-- <div class="flex-none">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-sm btn-danger">Switch User</label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow rounded-box w-32">
                        <li><button wire:click="loginAs('Amit')" class="text-left w-full bg-info">Amit</button></li>
                        <li><button wire:click="loginAs('Puskar')" class="text-left w-full">Puskar</button></li>
                    </ul>
                </div>
            </div> --}}
        </div>

        {{-- Messages Area --}}
        <div class="flex-1 overflow-y-auto p-4 space-y-4" id="messages-container">
            @foreach($this->messages as $message)
            <div class="chat {{ $message->sender_name === $currentUser ? 'chat-end' : 'chat-start' }}">
                {{-- <div class="chat-image avatar">
                    <div class="w-8 rounded-full bg-{{ $message->sender_name === 'Amit' ? 'primary' : 'secondary' }} flex items-center justify-center text-xs font-bold">
                        {{ substr($message->sender_name, 0, 1) }}
                    </div>
                </div> --}}
                <div class="chat-header text-xs opacity-70">
                    {{ $message->sender_name }}
                    <time class="ml-1">{{ $message->created_at->format('H:i') }}</time>
                </div>
                
                {{-- Reply Context --}}
                @if($message->replyTo)
                <div class="chat-bubble chat-bubble-accent text-xs mb-1 opacity-75">
                    <div class="text-xs font-medium">{{ $message->replyTo->sender_name }}</div>
                    <div>{{ Str::limit($message->replyTo->content, 50) }}</div>
                </div>
                @endif
                
                <div class="chat-bubble {{ $message->sender_name === $currentUser ? 'chat-bubble-primary' : 'chat-bubble-secondary' }}">
                    {{ $message->content }}
                </div>
                
                {{-- Reply Button --}}
                <div class="chat-footer opacity-40 text-xs mt-1">
                    <button wire:click="setReplyTo({{ $message->id }})" class="hover:text-primary">
                        Reply
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Reply Context Bar --}}
        @if($replyToEntry)
        <div class="bg-accent/20 p-3 border-t border-base-300">
            <div class="flex items-center justify-between">
                <div class="text-sm">
                    <span class="font-medium">Replying to {{ $replyToEntry->sender_name }}:</span>
                    <span class="opacity-70">{{ Str::limit($replyToEntry->content, 60) }}</span>
                </div>
                <button wire:click="cancelReply" class="btn btn-xs btn-ghost">✕</button>
            </div>
        </div>
        @endif

        {{-- Input Area --}}
        <div class="p-4 border-t border-base-300 bg-base-100">
            <div class="flex gap-2">
                <input wire:model="newMessage" 
                       wire:keydown.enter="sendMessage"
                       placeholder="Type your message..." 
                       class="input input-bordered flex-1">
                <button wire:click="sendMessage" class="btn btn-primary">
                    Send
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-scroll to bottom
    document.addEventListener('livewire:navigated', () => {
        const container = document.getElementById('messages-container');
        if (container) {
            container.scrollTop = container.scrollHeight;
        }
    });
</script>