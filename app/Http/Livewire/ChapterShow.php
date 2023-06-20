<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Book;
use App\Models\Chapter;

class ChapterShow extends Component
{
    public Book $book;
    public Chapter $chapter;
    public array $fonts;
    public $fontSize;
    public $lineHeight;
    public $fontFamily;
    public bool $nightMode;
    public $chapterNumber;

    //protected $listeners = ['changeChapter'];

    public function mount(Book $book, Chapter $chapter, $fonts) {
        $this->book = $book;
        $this->chapter = $chapter;
        $this->fonts = $fonts;
        $this->chapterNumber = $this->chapter->chapter_number;

        $default_preferences = [
            'fontFamily' => 'Merriweather',
            'fontSize' => '18',
            'lineHeight' => '32',
            'night' => false,
        ];

        if (session()->missing('user_preferences')) {
            session()->put(['user_preferences' => $default_preferences]);
        }

        if ($user = auth()->user()) {
            $user_preferences = $user->preferences;
            session()->put(['user_preferences' => $user_preferences]);

            //$user->books()->sync([$this->book->id => ['chapter_id' => $this->chapter->id]]);

        }

        $this->fontfamily = session()->get('user_preferences.fontfamily');
        $this->fontSize = session()->get('user_preferences.fontSize');
        $this->lineHeight = session()->get('user_preferences.lineHeight');
        $this->nightMode = session()->get('user_preferences.night');

    }

    public function changePreferences($key, $value) {
        $this->key = $key;
        $this->value = $value;
        if ($key === 'fontSize') {
            if ($value === 'add') {
                $this->value = session()->get('user_preferences.fontSize')+1;
                $this->fontSize = $this->value;
            } else {
                $this->value = session()->get('user_preferences.fontSize')-1;
                $this->fontSize = $this->value;
            }
        }
        if ($key === 'lineHeight') {
            if ($value === 'add') {
                $this->value = session()->get('user_preferences.lineHeight')+1;
                $this->lineHeight = $this->value;
            } else {
                $this->value = session()->get('user_preferences.lineHeight')-1;
                $this->lineHeight = $this->value;
            }
        }
        if ($key === 'night') {
            $mode = session()->get('user_preferences.night');
            $this->value = !$mode;
        }
        if ($key === 'fontFamily') {
            $this->fontFamily = $this->value;
        }
        session()->put(['user_preferences.'.$key => $this->value]);

        if ($user = auth()->user()) {
            $user->storeUserPreferences($this->key, $this->value);
        }
    }

    public function resetPreferences() {
        $default_preferences = [
            'fontFamily' => 'Merriweather',
            'fontSize' => '18',
            'lineHeight' => '32',
            'night' => 'false',
        ];
        session()->put(['user_preferences' => $default_preferences]);

        $this->nightMode = $default_preferences['night'];
        $this->fontSize = $default_preferences['fontSize'];
        $this->fontFamily = $default_preferences['fontFamily'];
        $this->lineHeight = $default_preferences['lineHeight'];

        if (auth()->user()) {
            auth()->user()->update([
                'preferences' => $default_preferences
            ]);
        }
    }

    public function updatedChapterNumber($number) {

        $this->chapterNumber = $number;

        $this->dispatchBrowserEvent('refresh-page');

        return redirect()->to('/novels/' . $this->book->slug .'/chapter-' . $this->chapterNumber);
    }


    public function render()
    {
        $fontSize = session()->get('user_preferences.fontSize');
        $fontFamily = session()->get('user_preferences.fontFamily');
        $lineHeight = session()->get('user_preferences.lineHeight');
        $nightMode = session()->get('user_preferences.night');

        $book = $this->book;
        $chapter = $this->chapter;
        $chapters = $book->chapters()->orderByRaw('CONVERT(chapter_number, SIGNED) desc')->get();
        $nextChapter = $book->chapters()->where('chapters.chapter_number', '=', $chapter->chapter_number+1 )->exists();
        $previousChapter = $book->chapters()->where('chapters.chapter_number', '=', $chapter->chapter_number-1 )->exists();

        return view('livewire.chapter-show',
            compact('book', 'chapter', 'chapters', 'fontSize', 'fontFamily', 'nightMode', 'lineHeight', 'nextChapter', 'previousChapter'
            ));
    }
}
