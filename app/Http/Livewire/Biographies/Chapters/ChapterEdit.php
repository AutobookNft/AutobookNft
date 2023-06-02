<?php

namespace App\Http\Livewire\Biographies\Chapters;

use App\Models\Biography_chapter;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class ChapterEdit extends Component
{
    protected $listeners = ['chapterUpdate', 'enableSaveButton'];

    public $chapter_id;

    public $msgError, $codError, $dontRepeat = false;

    public $to_save;

    public $chapter_title, $chapter_biography, $chapter_bio_date_dal, $chapter_bio_date_al, $isDisabled;
    public $biography, $chapter, $newChapter;

    public $chapterIdBeingRemoved, $confirmingChapterDelete;

    protected $rules = [
        'chapter_title' => 'nullable',
        'chapter_biography' => 'nullable',
        'chapter_bio_date_dal' => 'nullable',
        'chapter_bio_date_al' => 'nullable',
    ];

    protected $logger;

    public function mount($id)
    {

         $this->logger = app(Log::class);

        $this->chapter_id=$id;

        $this->chapter = Biography_chapter::findOrFail($id);

        $this->chapter_title = $this->chapter->chapter_title;
        $this->chapter_biography = $this->chapter->chapter_biography;
        $this->chapter_bio_date_dal = $this->chapter->chapter_bio_date_dal;
        $this->chapter_bio_date_al = $this->chapter->chapter_bio_date_al;


        $this->isDisabled=true;
        $this->to_save=false;

    }

    public function tosave(){

        $this->to_save=true;

    }

    public function addChapter()
    {

        // devo gestire il refresh della pagina che scatena un nuvo evento di aggiunta

        if (!$this->dontRepeat) {

            $this->newChapter = new Biography_chapter;

            $this->newChapter->user_id = Auth::user()->id;
            $this->newChapter->save();

            // $this->emit('added');

            $this->dontRepeat = true;

            return redirect(url('user/profile/biographies/chapter/' . $this->newChapter->id));

        } else {

            $this->dontRepeat = false;

        }

    }

    public function chapterUpdate($chapter)
    {

        $updateChapter = Biography_chapter::find($chapter);

        $this->validate();

        $this->emit('ceck');

        try {

            $updateChapter->chapter_title = isset($this->chapter_title) ? $this->chapter_title : '';
            $updateChapter->chapter_biography = isset($this->chapter_biography) ? $this->chapter_biography : '';
            $updateChapter->chapter_bio_date_dal = $this->chapter_bio_date_dal;
            $updateChapter->chapter_bio_date_al = $this->chapter_bio_date_al;

            $updateChapter->save();

            // dd($this->chapter_story);

            $this->emit('saved');

            $this->dontRepeat = true;


        } catch (Exception $e) {

            $this->msgError = $e->getMessage();
            $this->codError = $e->getCode();
            $this->emit('error');

        }

        redirect(url("user/profile/biographies/chapter/" . $this->chapter_id));

    }

    public function chapterDelete()
    {

        $deleteChapter = Biography_chapter::find($this->chapterIdBeingRemoved);

        // dd($deleteChapter);

        try {

            $deleteChapter->delete();
            $this->confirmingChapterDelete = false;
            return redirect()->route('biographies');


        } catch (Exception $e) {

            $this->msgError = $e->getMessage();
            $this->codError = $e->getCode();

            $this->emit('errore');

        }

    }


    public function confirmChapterDelete($chapter_id)
    {
        $this->confirmingChapterDelete = true;
        $this->chapterIdBeingRemoved = $chapter_id;

    }



    public function enableSaveButton()
    {
        $this->isDisabled = false;
    }

    public function render()
    {
        return view('livewire.biographies.chapters.chapter-edit');
    }
}
