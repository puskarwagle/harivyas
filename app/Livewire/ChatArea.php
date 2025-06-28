<?php

namespace App\Livewire;

use App\Models\Entries;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ChatArea extends Component
{
    public $currentUser;
    public $newMessage = '';
    public $newCodeTitle = '';
    public $newCodeContent = '';
    public $replyToId = null;
    public $replyToEntry = null;
    public $showCodeForm = false;
    public $editingCodeId = null;
    public $editingCodeTitle = '';
    public $editingCodeContent = '';

    public function mount()
    {
        $this->currentUser = session('current_user');
    }

    public function loginAs($user)
    {
        session(['current_user' => $user]);
        $this->currentUser = $user;
    }

    public function sendMessage()
    {
        if (trim($this->newMessage) === '') return;

        Entries::create([
            'sender_name' => $this->currentUser,
            'type' => 'message',
            'content' => $this->newMessage,
            'reply_to_id' => $this->replyToId,
        ]);

        $this->reset(['newMessage', 'replyToId', 'replyToEntry']);
    }

    public function sendCode()
    {
        if (trim($this->newCodeContent) === '') return;

        Entries::create([
            'sender_name' => $this->currentUser,
            'type' => 'code',
            'content' => $this->newCodeContent,
            'title' => $this->newCodeTitle ?: 'Untitled Code',
            'reply_to_id' => $this->replyToId,
        ]);

        $this->reset(['newCodeTitle', 'newCodeContent', 'replyToId', 'replyToEntry', 'showCodeForm']);
    }

    public function setReplyTo($entryId)
    {
        $this->replyToId = $entryId;
        $this->replyToEntry = Entry::find($entryId);
    }

    public function cancelReply()
    {
        $this->reset(['replyToId', 'replyToEntry']);
    }

    public function toggleCodeForm()
    {
        $this->showCodeForm = !$this->showCodeForm;
        if (!$this->showCodeForm) {
            $this->reset(['newCodeTitle', 'newCodeContent']);
        }
    }

    public function editCode($codeId)
    {
        $code = Entry::find($codeId);
        if ($code && $code->sender_name === $this->currentUser) {
            $this->editingCodeId = $codeId;
            $this->editingCodeTitle = $code->title;
            $this->editingCodeContent = $code->content;
        }
    }

    public function updateCode()
    {
        $code = Entry::find($this->editingCodeId);
        if ($code && $code->sender_name === $this->currentUser) {
            $code->update([
                'title' => $this->editingCodeTitle ?: 'Untitled Code',
                'content' => $this->editingCodeContent,
            ]);
        }
        $this->reset(['editingCodeId', 'editingCodeTitle', 'editingCodeContent']);
    }

    public function cancelEdit()
    {
        $this->reset(['editingCodeId', 'editingCodeTitle', 'editingCodeContent']);
    }

    public function deleteCode($codeId)
    {
        $code = Entry::find($codeId);
        if ($code && $code->sender_name === $this->currentUser) {
            $code->delete();
        }
    }

    public function getMessagesProperty()
    {
        return Entries::where('type', 'message')
            ->with('replyTo')
            ->orderBy('created_at')
            ->get();
    }

    public function getCodesProperty()
    {
        return Entries::where('type', 'code')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.chat-area')->layout('components.layouts.app.chats');
    }
}