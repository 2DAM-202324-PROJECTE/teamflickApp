<?php

namespace App\Livewire\Xats;

use App\Models\Xat;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;


class Createorupdatexat extends Component
{

    public $nom, $descripcio, $url, $password, $foto, $tipus, $privacitat, $idioma;
    public $isCreation = true;
    public ?Xat $xat;


    protected $rules = [
        'nom' => 'required|string|max:255',
        'descripcio' => 'required|string',
        'url' => 'required|url',
        'password' => 'required',
        'tipus' => 'required',
        'privacitat' => 'required',
        'idioma' => 'required',
    ];

    public function save()
    {
        $this->validate();

        if ($this->isCreation) {
            Xat::create($this->getModelData());
        } else {
            $this->xat->update($this->getModelData());
        }

        return redirect()->route('xats');
    }

    public function create()
    {
        Xat::create([
            'nom' => $this->nom,
            'descripcio' => $this->descripcio,
            //'usuari_id' => $this->usuari_id,
            'url' => $this->url, // Asegúrate de que 'url' es una propiedad pública en tu componente
            'password' => $this->password, // Asegúrate de manejar esto con cuidado por razones de seguridad
            'foto' => $this->foto,
            'tipus' => $this->tipus, // Asegúrate de que 'tipus' es una propiedad pública en tu componente
            'privacitat' => $this->privacitat, // Asegúrate de que 'privacitat' es una propiedad pública en tu componente
            'idioma' => $this->idioma, // Asegúrate de que 'idioma' es una propiedad pública en tu componente
        ]);
        return $this->redirectRoute('xats');
    }


    public function cancel()
    {
        return redirect()->to('/xats');
    }


    public function update()
    {
        if ($this->xat) {
            $this->xat->update([
                'nom' => $this->nom,
                'descripcio' => $this->descripcio,
                'url' => $this->url,
                'password' => $this->password,
                'foto' => $this->foto,
                'tipus' => $this->tipus,
                'privacitat' => $this->privacitat,
                'idioma' => $this->idioma,
            ]);
        }

        return redirect()->route('xats');
    }


    public function setCategory($id)
    {
        $this->xat = Xat::findOrFail($id);
        $this->nom = $this->xat->nom;
        $this->descripcio = $this->xat->descripcio;
        $this->foto = $this->xat->foto;
    }

    public function mount($id = null)
    {
        if ($id !== null) {
            $this->isCreation = false;
            try {
                $this->setXat($id);
            } catch (ModelNotFoundException $e) {
                session()->flash('message-danger', 'Xat no encontrado.');
            }
        }
    }


    protected function setXat($id)
    {
        $this->xat = Xat::findOrFail($id);
        $this->nom = $this->xat->nom;
        $this->descripcio = $this->xat->descripcio;
        $this->url = $this->xat->url;
        $this->password = $this->xat->password;
        $this->foto = $this->xat->foto;
        $this->tipus = $this->xat->tipus;
        $this->privacitat = $this->xat->privacitat;
        $this->idioma = $this->xat->idioma;
    }

    protected function getModelData()
    {
        return [
            'nom' => $this->nom,
            'descripcio' => $this->descripcio,
            'url' => $this->url,
            'password' => $this->password,
            'foto' => $this->foto,
            'tipus' => $this->tipus,
            'privacitat' => $this->privacitat,
            'idioma' => $this->idioma,
        ];
    }

    public function resetForm()
    {
        $this->nom= '';
        $this->descripcio = '';
        $this->foto = '';
        $this->xat = null;

        $this->isCreation = true;
    }


    public function render()
    {
        return view('livewire.xats.createorupdatexat');
    }
}
