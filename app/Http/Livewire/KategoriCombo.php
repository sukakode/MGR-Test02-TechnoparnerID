<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class KategoriCombo extends Component
{
    public $kategori = [];
    public $jenis = null;
    public $edit = null;
    public $catid = null;
    public $nominal = null;

    public function mount($edit = null) 
    {
        if ($edit != null) {
            $this->edit = $edit;
            $this->jenis = $edit->type;
            $data = $this->getKategori($this->jenis);
            $this->kategori = $data;
            $this->catid = $edit->category_id;
            $this->nominal = $edit->nominal;
        }
    }

    public function render()
    {
        return view('livewire.kategori-combo');
    }

    public function updatedJenis($value)
    {
        if ($value != '') {
            $this->emit('disabling');
            $data = $this->getKategori($value);
            $this->kategori = $data;
            $this->emit('enabling', $this->kategori);
        }
    }

    public function getKategori($type)
    {
        $data = Category::select('*', 'name as text')->where('type', '=', $type)->get()->toArray();
        return $data;
    }
}
