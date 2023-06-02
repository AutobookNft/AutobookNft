<?php

namespace App\Http\Livewire\Biographies;

use App\Models\Biography;
use App\Models\Biography_chapter;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Exception;

class Biographies extends Component
{

    public $user_id;

    public $msgError, $codError, $dontRepeat=false, $openPreview=false;

    public $bio_title, $bio_story, $biography, $chapter_title =[], $chapter_biography=[], $chapter_bio_date_dal=[], $chapter_bio_date_al=[];

    public $newChapter;

    protected $biographyChapters;

    public $BioIdBeingRemoved, $confirmingBioDelete, $chapterIdBeingRemoved, $confirmingChapterDelete, $bioChapt;

    protected $rules = [
        'bio_title' => 'nullable',
        'bio_story' => 'nullable',
        'chapters.*.chapter_title' => 'nullable',
        'chapters.*.chapter_biography' => 'nullable',
        'chapters.*.chapter_bio_date_dal' => 'nullable',
        'chapters.*.chapter_bio_date_al' => 'nullable',
    ];

    public function mount()
    {

        $this->user_id = Auth::user()->id;
        $this->biography = Auth::user();
        $this->biographyChapters = $this->biography->bio_chapters()->get();
        // dd($this->biographyChapters);

        $this->bio_title = $this->biography->bio_title;
        $this->bio_story = $this->biography->bio_story;


    }

    public function render()
    {
        $data = [
            'chapters'=> $this->biographyChapters ? :''
        ];

        return view('livewire.biographies.biographies',$data);
    }

    public function update()
    {

        $this->validate();

        try {

            $this->biography->bio_title = isset($this->bio_title) ? $this->bio_title : '';
            $this->biography->bio_story = isset($this->bio_story) ? $this->bio_story : '';

            $this->biography->save();
            $this->emit('saved');
            return redirect()->route('biographies');

        } catch (Exception $e) {

            $this->msgError = $e->getMessage();
            $this->codError = $e->getCode();

            $this->emit('errore');

        }

    }

    public function delete()
    {

        $this->bio_title = null;
        $this->bio_story = null;

        $this->biography->bio_title=null;
        $this->biography->bio_story=null;

        $this->biography->save();

        $this->confirmingBioDelete = false;

        redirect(url('user/profile/biographies'));

    }

    public function chapterDelete()
    {

        $deleteChapter = Biography_chapter::find($this->chapterIdBeingRemoved);

       // dd($deleteChapter);

        try {

            $deleteChapter->delete();
            $this->confirmingBioDelete = false;
            return redirect()->route('biographies');


        } catch (Exception $e) {

            $this->msgError = $e->getMessage();
            $this->codError = $e->getCode();

            $this->emit('errore');

        }

    }

    public function confirmBioDelete()
    {
        $this->confirmingBioDelete = true;

    }

    public function confirmChapterDelete($chapter_id)
    {
        $this->confirmingChapterDelete = true;
        $this->chapterIdBeingRemoved=$chapter_id;

    }

    public function addChapter()
    {

        if (!$this->dontRepeat){

            $this->newChapter = new Biography_chapter;

            $this->newChapter->user_id = $this->user_id;
            $this->newChapter->save();

            // $this->emit('added');

            $this->dontRepeat=true;

            return redirect(url('user/profile/biographies/chapter/'. $this->newChapter->id));

        }else{

            $this->dontRepeat=false;

        }

    }

    public function chapterUpdate($chapter, $index)
    {

        $updateChapter = Biography_chapter::find($chapter);

        // dd($this->chapters[$index]['chapter_title']);

        $this->validate();

        try {

            $updateChapter->chapter_title = isset($this->chapters[$index]['chapter_title']) ? $this->chapters[$index]['chapter_title'] : '';
            $updateChapter->chapter_story = isset($this->chapters[$index]['chapter_story']) ? $this->chapters[$index]['chapter_story'] : '';
            $updateChapter->chapter_date_dal = $this->chapters[$index]['chapter_date_dal'];
            $updateChapter->chapter_date_al = $this->chapters[$index]['chapter_date_al'];

            $updateChapter->save();

            $this->emit('saved_c');

            $this->dontRepeat=true;

            return redirect()->route('biographies');

        } catch (Exception $e) {

            $this->msgError = $e->getMessage();
            $this->codError = $e->getCode();

            $this->emit('errore_c'. $index);

        }

    }

public function preview(){

    $this->openPreview=true;


}

    public function closeModal()
    {

        $this->openPreview = false;


    }

    public function confirmBioUpdate()
    {

        // $this->biography = $newBio->title;
        // $this->biography->biography = $newBio->biography;
        // $this->biography->bio_data = $newBio->bio_data;
        // $this->edit_royalty_scd_market = $newBio->royalty_scd_market;

    }
}
