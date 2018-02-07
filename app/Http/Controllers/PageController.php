<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Input;
use View;

use App\Apartamente;
use App\Case_si_vile;
use App\Comerciale;
use App\Industriale;
use App\Terenuri;
use App\Garaje;
use App\Altele;
use App\Pages;
use App\ComplexeRezidentiale;
use App\TipImobil;
use App\Noutati;
use App\InformatiiUtile;

use Jenssegers\Agent\Agent;

use Config;
use Session;

use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use Storage;
use File;
use Lang;

class PageController extends Controller
{
    public function __construct() {
        if (session()->has('apartamente')) {
            $array_apartamente = session('apartamente');
            $session_apartamente = Apartamente::whereIn('id', $array_apartamente)->get();
            View::share('session_apartamente', $session_apartamente);
        }
        if (session()->has('case')) {
            $array_case = session('case');
            $session_case = Case_si_vile::whereIn('id', $array_case)->get();
            View::share('session_case', $session_case);
        }
        if (session()->has('comerciale')) {
            $array_comerciale = session('comerciale');
            $session_comerciale = Comerciale::whereIn('id', $array_comerciale)->get();
            View::share('session_comerciale', $session_comerciale);
        }
        if (session()->has('industriale')) {
            $array_industriale = session('industriale');
            $session_industriale = Industriale::whereIn('id', $array_industriale)->get();
            View::share('session_industriale', $session_industriale);
        }
        if (session()->has('terenuri')) {
            $array_terenuri = session('terenuri');
            $session_terenuri = Terenuri::whereIn('id', $array_terenuri)->get();
            View::share('session_apartamente', $session_terenuri);
        }
        if (session()->has('garaje')) {
            $array_garaje = session('garaje');
            $session_garaje = Garaje::whereIn('id', $array_garaje)->get();
            View::share('session_garaje', $session_garaje);
        }
        if (session()->has('altele')) {
            $array_altele = session('altele');
            $session_altele = Altele::whereIn('id', $array_altele)->get();
            View::share('session_altele', $session_altele);
        }
        if (session()->has('complexe_rezidentiale')) {
            $array_complexe_rezidentiale = session('complexe_rezidentiale');
            $session_complexe_rezidentiale = ComplexeRezidentiale::whereIn('id', $array_complexe_rezidentiale)->get();
            View::share('session_complexe_rezidentiale', $session_complexe_rezidentiale);
        }
        // $url_domain = 'http://admin.lesternau.md';
        $agent = new Agent();
        View::share('agent', $agent);
    }

    public function resizeImages()
    {
        $images = Terenuri::all();

        foreach ($images as $r) 
        {
            $img = $r['foto_1'];
            
            if ( Storage::disk('public')->has($img) )
            {
                $file = Storage::disk('public')->get($img);
                // $extension = File::extension($file);

                $image = Image::make($file)->resize(1800, null,
                    function (Constraint $constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                })->encode('jpg', 75);

                Storage::disk('public_temp')->put($img, $image);
            }
        }

        foreach ($images as $r) 
        {
            $img_2 = $r['foto_2'];
            $img_2 = str_replace('[', '', $img_2);
            $img_2 = str_replace(']', '', $img_2);
            $img_2 = str_replace('{', '', $img_2);
            $img_2 = str_replace('}', '', $img_2);

            $img_2 = str_replace('"0"', '', $img_2);
            $img_2 = str_replace('"1"', '', $img_2);
            $img_2 = str_replace('"2"', '', $img_2);
            $img_2 = str_replace('"3"', '', $img_2);
            $img_2 = str_replace('"4"', '', $img_2);
            $img_2 = str_replace('"5"', '', $img_2);
            $img_2 = str_replace('"6"', '', $img_2);
            $img_2 = str_replace('"7"', '', $img_2);
            $img_2 = str_replace('"8"', '', $img_2);
            $img_2 = str_replace('"9"', '', $img_2);
            $img_2 = str_replace('"10"', '', $img_2);

            $img_2 = str_replace('"', '', $img_2);
            $img_2 = str_replace('\\', '', $img_2);
            $img_2 = str_replace(':', '', $img_2);
            $img_2 = explode(',', $img_2);

            foreach ($img_2 as $img) {
                if ( Storage::disk('public')->has($img) )
                {
                    $file = Storage::disk('public')->get($img);
                    // $extension = File::extension($file);

                    $image = Image::make($file)->resize(1800, null,
                        function (Constraint $constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                    })->encode('jpg', 75);

                    Storage::disk('public_temp')->put($img, $image);
                }
            }
        }

        return 'success';
    }

    public function language($lang) {
        // if (array_key_exists($lang, ['ro', 'ru'])) {
            Session::put('applocale', $lang);
        // }
        return redirect()->back();
    }

    public function flush()
    {
        session()->flush();

        echo 'Flush session with success !';
    }
    public function sessionAll()
    {
        $data = session()->all();
        var_dump($data);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public function testView()
    {
        // $agent = new Agent();
        // return view('test-view', compact('agent'));

        // // **** Replace ', ]' with ']' ***
        // $table = Apartamente::all();


        // foreach ($table as $r)
        // {
        //     if ( $r->foto_2 != '' )
        //     {
        //         $data = $r->foto_2;
        //         $replace = str_replace(', ]', ']', $data);
        //     }
        //     $id = $r->id;
        //     Apartamente::where('id', $id)->update(['foto_2' => $replace]);
        // }

        // return 'executed';

        // // *** Change to Multiple photo *** 
        // $table = Apartamente::all();


        // foreach ($table as $r)
        // {
        //     $multiple = '[';

        //     for ($i=2; $i<16; $i++)
        //     {
        //         if ( $r->{'foto_'.$i} != '' )
        //         {
        //             $multiple.= '"'.$r->{'foto_'.$i}.'", ';
        //         }
        //     }

        //     $multiple.= ']';

        //     $id = $r->id;
        //     Apartamente::where('id', $id)->update(['foto_2' => $multiple]);
        // }

        // return 'executed';
    }

    public function index()
    {
        $oferte_noi = Apartamente::where('publicat', 1)->where('foto_1', '!=', '')->take(30)->get();
        $ofertele_noastre = Apartamente::where('publicat', 1)->where('foto_1', '!=', '')->orderBy('id', 'DESC')->take(30)->get();

    	return view('page.index', compact('oferte_noi', 'ofertele_noastre'));
    }

    // Apartamente
    public function apartamenteVinzare()
    {
    	$result = Apartamente::where('tip', 'Vînzare')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';

    	return view('page.apartamente-vinzare', compact('result', 'search'));
    }

    public function searchPost(Request $request)
    {
        if ($request->page_form_name == 'apartamente_vinzare') $query = Apartamente::select();
        if ($request->page_form_name == 'case_si_vile_vinzare') $query = Case_si_vile::select();
        if ($request->page_form_name == 'spatii_comerciale_vinzare') $query = Comerciale::select();
        if ($request->page_form_name == 'spatii_industriale_vinzare') $query = Industriale::select();
        if ($request->page_form_name == 'terenuri_vinzare') $query = Terenuri::select();
        if ($request->page_form_name == 'garaje_vinzare') $query = Garaje::select();
        if ($request->page_form_name == 'altele_vinzare') $query = Altele::select();

        // Rezultate apartamente
        if ( session('applocale') == 'ro' ) 
        {
            if ($request->page_form_name == 'rezultate_apartamente') {
                $query = Apartamente::select();
                $query->where('titlu_ro', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ro', 'like', '%'.$request->search_words.'%')
                    ->orWhere('vecinatati_ro', 'like', '%'.$request->search_words.'%')
                    ->orWhere('alte_dotari_ro', 'like', '%'.$request->search_words.'%')
                    ->orWhere('titlu_ru', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ru', 'like', '%'.$request->search_words.'%')
                    ->orWhere('numar_de_camere', 'like', '%'.$request->search_words.'%')
                    ->orWhere('nivelul', 'like', '%'.$request->search_words.'%')
                    ->orWhere('numar_de_nivele', 'like', '%'.$request->search_words.'%')
                    ->orWhere('tipul_cladirii', 'like', '%'.$request->search_words.'%')
                    ->orWhere('planul_cladirii', 'like', '%'.$request->search_words.'%')
                    ->orWhere('suprafata_totala', 'like', '%'.$request->search_words.'%')
                    ->orWhere('starea', 'like', '%'.$request->search_words.'%')
                    ->orWhere('parcare', 'like', '%'.$request->search_words.'%')
                    ->orWhere('strada', 'like', '%'.$request->search_words.'%')
                    ->orWhere('sector', 'like', '%'.$request->search_words.'%');
            }
        }
        if ( session('applocale') == 'ru' ) 
        {
            if ($request->page_form_name == 'rezultate_apartamente') {
                $query = Apartamente::select();
                $query->where('titlu_ru', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ru', 'like', '%'.$request->search_words.'%');
            }
        }
        // Rezultate case si vile
        if ( session('applocale') == 'ro' ) 
        {
            if ($request->page_form_name == 'rezultate_case_si_vile') {
                $query = Case_si_vile::select();
                $query->where('titlu_ro', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ro', 'like', '%'.$request->search_words.'%');
            }
        }
        if ( session('applocale') == 'ru' ) 
        {
            if ($request->page_form_name == 'rezultate_case_si_vile') {
                $query = Case_si_vile::select();
                $query->where('titlu_ru', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ru', 'like', '%'.$request->search_words.'%');
            }
        }
        // Rezultate spatii comerciale
        if ( session('applocale') == 'ro' ) 
        {
            if ($request->page_form_name == 'rezultate_spatii_comerciale') {
                $query = Comerciale::select();
                $query->where('titlu_ro', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ro', 'like', '%'.$request->search_words.'%');
            }
        }
        if ( session('applocale') == 'ru' ) 
        {
            if ($request->page_form_name == 'rezultate_spatii_comerciale') {
                $query = Comerciale::select();
                $query->where('titlu_ru', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ru', 'like', '%'.$request->search_words.'%');
            }
        }
        // Rezultate spatii industriale
        if ( session('applocale') == 'ro' ) 
        {
            if ($request->page_form_name == 'rezultate_spatii_industriale') {
                $query = Industriale::select();
                $query->where('titlu_ro', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ro', 'like', '%'.$request->search_words.'%');
            }
        }
        if ( session('applocale') == 'ru' ) 
        {
            if ($request->page_form_name == 'rezultate_spatii_industriale') {
                $query = Industriale::select();
                $query->where('titlu_ru', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ru', 'like', '%'.$request->search_words.'%');
            }
        }
        // Rezultate terenuri
        if ( session('applocale') == 'ro' ) 
        {
            if ($request->page_form_name == 'rezultate_terenuri') {
                $query = Terenuri::select();
                $query->where('titlu_ro', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ro', 'like', '%'.$request->search_words.'%');
            }
        }
        if ( session('applocale') == 'ru' ) 
        {
            if ($request->page_form_name == 'rezultate_terenuri') {
                $query = Terenuri::select();
                $query->where('titlu_ru', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ru', 'like', '%'.$request->search_words.'%');
            }
        }
        // Rezultate garaje
        if ( session('applocale') == 'ro' ) 
        {
            if ($request->page_form_name == 'rezultate_garaje') {
                $query = Garaje::select();
                $query->where('titlu_ro', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ro', 'like', '%'.$request->search_words.'%');
            }
        }
        if ( session('applocale') == 'ru' ) 
        {
            if ($request->page_form_name == 'rezultate_garaje') {
                $query = Garaje::select();
                $query->where('titlu_ru', 'like', '%'.$request->search_words.'%')
                    ->orWhere('descrierea_ru', 'like', '%'.$request->search_words.'%');
            }
        }
        
        if (isset($request->tip)) $query->where('tip', $request->tip);
        if (isset($request->numar_de_camere) && $request->numar_de_camere != '') $query->where('numar_de_camere', $request->numar_de_camere);
        if (isset($request->sector) && $request->sector != 'toate') $query->where('sector', $request->sector);
        if (isset($request->parcare) && $request->parcare != 'toate') $query->where('parcare', $request->parcare);
        if (isset($request->pret_max) && $request->pret_max != '') $query->where('pret', '<=', $request->pret_max);
        if (isset($request->suprafata_totala_max) && $request->suprafata_totala_max != '') $query->where('suprafata_totala', '<', $request->suprafata_totala_max);
        if (isset($request->suprafata_terenului_max) && $request->suprafata_terenului_max != '') $query->where('suprafata_terenului', '<', $request->suprafata_terenului_max);

        // Suprafata totala Between
        $suprafa_totala_de_la = array();
        if (isset($request->suprafata_totala_de_la) ) $suprafata_totala_de_la[] = $request->suprafata_totala_de_la;
        if (isset($request->suprafata_totala_pina_la)) $suprafata_totala_de_la[] = $request->suprafata_totala_pina_la;
        if (!empty($suprafa_totala_de_la)) $query->whereBetween('suprafata_totala', $suprafata_totala_de_la[]);
        // Suprafata terenului Between
        $suprafa_terenului_de_la = array();
        if (isset($request->suprafata_terenului_de_la) ) $suprafata_terenului_de_la[] = $request->suprafata_terenului_de_la;
        if (isset($request->suprafata_terenului_pina_la)) $suprafata_terenului_de_la[] = $request->suprafata_terenului_pina_la;
        if (!empty($suprafa_terenului_de_la)) $query->whereBetween('suprafata_terenului', $suprafata_totala_de_la);


        // Not placed in search slider

        // Sector
        $sector = array();
        if (isset($request->aeroport)) $sector[] = $request->aeroport;
        if (isset($request->botanica)) $sector[] = $request->botanica;
        if (isset($request->buiucani)) $sector[] = $request->buiucani;
        if (isset($request->centru)) $sector[] = $request->centru;
        if (isset($request->ciocana)) $sector[] = $request->ciocana;
        if (isset($request->durlesti)) $sector[] = $request->durlesti;
        if (isset($request->posta_veche)) $sector[] = $request->posta_veche;
        if (isset($request->riscani)) $sector[] = $request->riscani;
        if (isset($request->sculeni)) $sector[] = $request->sculeni;
        if (isset($request->telecentru)) $sector[] = $request->telecentru;
        // Suburbii
        $not_in = array('Aeroport', 'Botanica', 'Buiucani', 'Centru', 'Ciocana', 'Durlești', 'Poșta veche', 'Rîșcani', 'Sculeni', 'Telecentru');
        if (empty($sector) && isset($request->chisinau_suburbii) && !isset($request->alte_localitati)) $query->whereNotIn('sector', $not_in);
        if (empty($sector) && isset($request->alte_localitati) && !isset($request->chisinau_suburbii)) $query->whereNotIn('sector', $not_in);
        if (empty($sector) && isset($request->chisinau_suburbii) && isset($request->alte_localitati)) $query->whereNotIn('sector', $not_in);
        // if (isset($request->bacioi)) $sector[] = $request->bacioi;
        // if (isset($request->bic)) $sector[] = $request->bic;
        // if (isset($request->braila)) $sector[] = $request->braila;
        // if (isset($request->bubuieci)) $sector[] = $request->bubuieci;
        // if (isset($request->budesti)) $sector[] = $request->budesti;
        // if (isset($request->buneti)) $sector[] = $request->buneti;
        // if (isset($request->ceroborta)) $sector[] = $request->ceroborta;
        // if (isset($request->cheltuitor)) $sector[] = $request->cheltuitor;
        // if (isset($request->ciorescu)) $sector[] = $request->ciorescu;
        // if (isset($request->codru)) $sector[] = $request->codru;
        // if (isset($request->colonita)) $sector[] = $request->colonita;
        // if (isset($request->cricova)) $sector[] = $request->cricova;
        // if (isset($request->cruzesti)) $sector[] = $request->cruzesti;
        // if (isset($request->dobruja)) $sector[] = $request->dobruja;
        // if (isset($request->dumbrava)) $sector[] = $request->dumbrava;
        // if (isset($request->fauresti)) $sector[] = $request->fauresti;
        // if (isset($request->frumusica)) $sector[] = $request->frumusica;
        // if (isset($request->ghidighici)) $sector[] = $request->ghidighici;
        // if (isset($request->goian)) $sector[] = $request->goian;
        // if (isset($request->goianul_nou)) $sector[] = $request->goianul_nou;
        // if (isset($request->gratiesti)) $sector[] = $request->gratiesti;
        // if (isset($request->hulboaca)) $sector[] = $request->hulboaca;
        // if (isset($request->humulesti)) $sector[] = $request->humulesti;
        // if (isset($request->revaca)) $sector[] = $request->revaca;
        // if (isset($request->singera)) $sector[] = $request->singera;
        // if (isset($request->stauceni)) $sector[] = $request->stauceni;
        // if (isset($request->straisteni)) $sector[] = $request->straisteni;
        // if (isset($request->tohatin)) $sector[] = $request->tohatin;
        // if (isset($request->truseni)) $sector[] = $request->truseni;
        // if (isset($request->vaduleni)) $sector[] = $request->vaduleni;
        // if (isset($request->vadul_lui_voda)) $sector[] = $request->vadul_lui_voda;
        // if (isset($request->vatra)) $sector[] = $request->vatra;
        // if (isset($request->balti_mun)) $sector[] = $request->balti_mun;
        // if (isset($request->tiraspol)) $sector[] = $request->tiraspol;
        // if (isset($request->cahul)) $sector[] = $request->cahul;
        // if (isset($request->anenii_noi)) $sector[] = $request->anenii_noi;
        // if (isset($request->basarabeasca)) $sector[] = $request->basarabeasca;
        // if (isset($request->bender_mun)) $sector[] = $request->bender_mun;
        // if (isset($request->briceni)) $sector[] = $request->briceni;
        // if (isset($request->calarasi)) $sector[] = $request->calarasi;
        // if (isset($request->camenca)) $sector[] = $request->camenca;
        // if (isset($request->cantemir)) $sector[] = $request->cantemir;
        // if (isset($request->causeni)) $sector[] = $request->causeni;
        // if (isset($request->ciadir_lunga)) $sector[] = $request->ciadir_lunga;
        // if (isset($request->cimislia)) $sector[] = $request->cimislia;
        // if (isset($request->comrat)) $sector[] = $request->comrat;
        // if (isset($request->criuleni)) $sector[] = $request->criuleni;
        // if (isset($request->dnestrovsk)) $sector[] = $request->dnestrovsk;
        // if (isset($request->donduseni)) $sector[] = $request->donduseni;
        // if (isset($request->drochia)) $sector[] = $request->drochia;
        // if (isset($request->dubasari)) $sector[] = $request->dubasari;
        // if (isset($request->edinet)) $sector[] = $request->edinet;
        // if (isset($request->falesti)) $sector[] = $request->falesti;
        // if (isset($request->floresti)) $sector[] = $request->floresti;
        // if (isset($request->glodeni)) $sector[] = $request->glodeni;
        // if (isset($request->grigoriopol)) $sector[] = $request->grigoriopol;
        // if (isset($request->hincesti)) $sector[] = $request->hincesti;
        // if (isset($request->ialoveni)) $sector[] = $request->ialoveni;
        // if (isset($request->leova)) $sector[] = $request->leova;
        // if (isset($request->nisporeni)) $sector[] = $request->nisporeni;
        // if (isset($request->ocnita)) $sector[] = $request->ocnita;
        // if (isset($request->orhei)) $sector[] = $request->orhei;
        // if (isset($request->rezina)) $sector[] = $request->rezina;
        // if (isset($request->ribnita)) $sector[] = $request->ribnita;
        // if (isset($request->riscani)) $sector[] = $request->riscani;
        // if (isset($request->singerei)) $sector[] = $request->singerei;
        // if (isset($request->slobozia)) $sector[] = $request->slobozia;
        // if (isset($request->soldanesti)) $sector[] = $request->soldanesti;
        // if (isset($request->soroca)) $sector[] = $request->soroca;
        // if (isset($request->stefan_voda)) $sector[] = $request->stefan_voda;
        // if (isset($request->straseni)) $sector[] = $request->straseni;
        // if (isset($request->taraclia)) $sector[] = $request->taraclia;
        // if (isset($request->telenesti)) $sector[] = $request->telenesti;
        // if (isset($request->ungheni)) $sector[] = $request->ungheni;
        // if (isset($request->vulcanesti)) $sector[] = $request->vulcanesti;
        if (!empty($sector)) $query->whereIn('sector', $sector);
        // Tip
        $tip = array();
        if (isset($request->vinzare)) $tip[] = $request->vinzare;
        if (isset($request->arenda)) $tip[] = $request->arenda;
        if (!empty($tip)) $query->whereIn('tip', $tip);
        //Starea
        $starea = array();
        if (isset($request->reparatie_simpla)) $starea[] = $request->reparatie_simpla;
        if (isset($request->euroreparatie)) $starea[] = $request->euroreparatie;
        if (isset($request->varianta_alba)) $starea[] = $request->varianta_alba;
        if (isset($request->necesita_reparatie)) $starea[] = $request->necesita_reparatie;
        if (!empty($starea)) $query->whereIn('starea', $starea);
        // Pretul
        if (isset($request->pretul_pina_la) && $request->pretul_pina_la != '') $query->where('pret', '<=', $request->pretul_pina_la);
        // Numar de camere
        $numar_de_camere = array();
        if (isset($request->n1_camere)) $numar_de_camere[] = $request->n1_camere;
        if (isset($request->n2_camere)) $numar_de_camere[] = $request->n2_camere;
        if (isset($request->n3_camere)) $numar_de_camere[] = $request->n3_camere;
        if (isset($request->n4_camere)) $numar_de_camere[] = $request->n4_camere;
        if (!empty($numar_de_camere)) $query->whereIn('numar_de_camere', $numar_de_camere);
        // Planul Cladirii
        $planul_cladirii = array();
        if (isset($request->n102)) $planul_cladirii[] = $request->n102;
        if (isset($request->n135)) $planul_cladirii[] = $request->n135;
        if (isset($request->n143)) $planul_cladirii[] = $request->n143;
        if (isset($request->gostinca)) $planul_cladirii[] = $request->gostinca;
        if (isset($request->brejnevka)) $planul_cladirii[] = $request->brejnevka;
        if (isset($request->camin_familial)) $planul_cladirii[] = $request->camin_familial;
        if (isset($request->ceska)) $planul_cladirii[] = $request->ceska;
        if (isset($request->hrusciovka)) $planul_cladirii[] = $request->hrusciovka;
        if (isset($request->individuala)) $planul_cladirii[] = $request->individuala;
        if (isset($request->ms)) $planul_cladirii[] = $request->ms;
        if (isset($request->rubaska)) $planul_cladirii[] = $request->rubaska;
        if (isset($request->stalinka)) $planul_cladirii[] = $request->stalinka;
        if (isset($request->varnitkaia)) $planul_cladirii[] = $request->varnitkaia;
        if (!empty($planul_cladirii)) $query->whereIn('planul_cladirii', $planul_cladirii);
        // Suprafata totala
        if (isset($request->suprafata_totala_pina_la) && $request->suprafata_totala_pina_la != '') $query->where('suprafata_totala', '<=', $request->suprafata_totala_pina_la);
        // Suprafata terenului
        if (isset($request->suprafata_terenului) && $request->suprafata_terenului != '') $query->where('suprafata_terenului', '<=', $request->suprafata_terenului);
        // Nivelul
        $nivelul = array();
        for ($i=1; $i<26; $i++) {
            if ( isset($request->{'n'.$i.'_nivel'}) ) $nivelul[] = $request->{'n'.$i.'_nivel'};
        }
        if (isset($request->demisol_nivel)) $nivelul[] = $request->demisol_nivel;
        if (isset($request->mansarda_nivel)) $nivelul[] = $request->mansarda_nivel;
        if (isset($request->penthouse_nivel)) $nivelul[] = $request->penthouse_nivel;
        if (isset($request->subsol_nivel)) $nivelul[] = $request->subsol_nivel;
        if (!empty($nivelul)) $query->whereIn('nivelul', $nivelul);
        // Numar de nivele
        $numar_de_nivele = array();
        for ($i=1; $i<26; $i++) {
            if ( isset($request->{'n'.$i.'_numar_de_nivele'}) ) $numar_de_nivele[] = $request->{'n'.$i.'_numar_de_nivele'};
        }
        if (!empty($numar_de_nivele)) $query->whereIn('numar_de_nivele', $numar_de_nivele);
        // Tipul cladirii
        $tipul_cladirii = array();
        if (isset($request->beton)) $tipul_cladirii[] = $request->beton;
        if (isset($request->beton_celular)) $tipul_cladirii[] = $request->beton_celular;
        if (isset($request->blocuri)) $tipul_cladirii[] = $request->blocuri;
        if (isset($request->caramida)) $tipul_cladirii[] = $request->caramida;
        if (isset($request->combinat)) $tipul_cladirii[] = $request->combinat;
        if (isset($request->cotilet)) $tipul_cladirii[] = $request->cotilet;
        if (isset($request->lemn)) $tipul_cladirii[] = $request->lemn;
        if (isset($request->monolit)) $tipul_cladirii[] = $request->monolit;
        if (isset($request->panouri)) $tipul_cladirii[] = $request->panouri;
        if (!empty($tipul_cladirii)) $query->whereIn('tipul_cladirii', $tipul_cladirii);
        // Balcon
        $balcon = array();
        if (isset($request->n1_balcon)) $balcon[] = $request->n1_balcon;
        if (isset($request->n2_balcon)) $balcon[] = $request->n2_balcon;
        if (isset($request->n3_balcon)) $balcon[] = $request->n3_balcon;
        if (isset($request->n4_balcon)) $balcon[] = $request->n4_balcon;
        if (isset($request->nu_balcon)) $balcon[] = $request->nu_balcon;
        if (!empty($balcon)) $query->whereIn('balcon', $balcon);
        // Baie
        $baie = array();
        if (isset($request->n1_baie)) $baie[] = $request->n1_baie;
        if (isset($request->n2_baie)) $baie[] = $request->n2_baie;
        if (isset($request->n3_baie)) $baie[] = $request->n3_baie;
        if (isset($request->n3_baie)) $baie[] = $request->n3_baie;
        if (isset($request->nu_baie)) $baie[] = $request->nu_baie;
        if (!empty($baie)) $query->whereIn('baie', $baie);
        // Bloc sanitar
        $bloc_sanitar = array();
        if (isset($request->n1_bloc_sanitar)) $bloc_sanitar[] = $request->n1_bloc_sanitar;
        if (isset($request->n2_bloc_sanitar)) $bloc_sanitar[] = $request->n2_bloc_sanitar;
        if (isset($request->n3_bloc_sanitar)) $bloc_sanitar[] = $request->n3_bloc_sanitar;
        if (isset($request->n4_bloc_sanitar)) $bloc_sanitar[] = $request->n4_bloc_sanitar;
        if (isset($request->nu_bloc_sanitar)) $bloc_sanitar[] = $request->nu_bloc_sanitar;
        if (!empty($bloc_sanitar)) $query->whereIn('bloc_sanitar', $bloc_sanitar);
        // Parcare
        $parcare = array();
        if (isset($request->deschis_parcare)) $parcare[] = $request->deschis_parcare;
        if (isset($request->garaj_parcare)) $parcare[] = $request->garaj_parcare;
        if (isset($request->sub_acoperis_parcare)) $parcare[] = $request->sub_acoperis_parcare;
        if (isset($request->subterana_parcare)) $parcare[] = $request->subterana_parcare;
        if (!empty($parcare)) $query->whereIn('parcare', $parcare);
        // Modul de folosinta
        $modul_de_folosinta = array();
        if (isset($request->pentru_constructii)) $modul_de_folosinta[] = $request->pentru_constructii;
        if (isset($request->agricol)) $modul_de_folosinta[] = $request->agricol;
        if (isset($request->gradina)) $modul_de_folosinta[] = $request->gradina;
        if (isset($request->lot_pomicol)) $modul_de_folosinta[] = $request->lot_pomicol;
        if (!empty($modul_de_folosinta)) $query->whereIn('modul_de_folosinta', $modul_de_folosinta);
        
        // Retele ingineresti
        if (isset($request->apeduct)) $query->whereIn('apeduct', array($request->apeduct));
        if (isset($request->arteziana)) $query->whereIn('arteziana', array($request->arteziana));
        if (isset($request->retele_electrice)) $query->whereIn('retele_electrice', array($request->retele_electrice));
        if (isset($request->gaz)) $query->whereIn('gaz', array($request->gaz));
        if (isset($request->canalizare_locala)) $query->whereIn('canalizare_locala', array($request->canalizare_locala));
        if (isset($request->canalizare_centrala)) $query->whereIn('canalizare_centrala', array($request->canalizare_centrala));
        
        // $retele_ingineresti = array();
        // if (isset($request->apeduct)) $retele_ingineresti[] = $request->apeduct;
        // if (isset($request->arteziana)) $retele_ingineresti[] = $request->arteziana;
        // if (isset($request->retele_electrice)) $retele_ingineresti[] = $request->retele_electrice;
        // if (isset($request->gaz)) $retele_ingineresti[] = $request->gaz;
        // if (isset($request->canalizare_locala)) $retele_ingineresti[] = $request->canalizare_locala;
        // if (isset($request->canalizare_centrala)) $retele_ingineresti[] = $request->canalizare_centrala;
        // if (!empty($retele_ingineresti)) $query->whereIn('retele_ingineresti', $retele_ingineresti);

        $result = $query->where('publicat', 1)->get();
        $search = 'yes';

        if ($request->ajax()) {
            return response()->json(['msg' => $result]);
        } 

        // Cautare in anunturi
        if ( !($request->ajax()) && $request->page_form_name == 'rezultate_apartamente' ) {
            return view('page.apartamente-vinzare', compact('result', 'search'));
        }
        if ( !($request->ajax()) && $request->page_form_name == 'rezultate_case_si_vile' ) {
            return view('page.case-vinzare', compact('result', 'search'));
        }
        if ( !($request->ajax()) && $request->page_form_name == 'rezultate_spatii_comerciale' ) {
            return view('page.comerciale-vinzare', compact('result', 'search'));
        }
        if ( !($request->ajax()) && $request->page_form_name == 'rezultate_spatii_industriale' ) {
            return view('page.industriale-vinzare', compact('result', 'search'));
        }
        if ( !($request->ajax()) && $request->page_form_name == 'rezultate_terenuri' ) {
            return view('page.terenuri-vinzare', compact('result', 'search'));
        }
        if ( !($request->ajax()) && $request->page_form_name == 'rezultate_garaje' ) {
            return view('page.garaje-vinzare', compact('result', 'search'));
        }

        // Cautare slider
        if (!($request->ajax()) && $request->page_form_name == 'apartamente_vinzare') {
            return view('page.apartamente-vinzare', compact('result', 'search'));
        }
        if (!($request->ajax()) && $request->page_form_name == 'case_si_vile_vinzare') {
            return view('page.case-vinzare', compact('result', 'search'));
        }
        if (!($request->ajax()) && $request->page_form_name == 'spatii_comerciale_vinzare') {
            return view('page.comerciale-vinzare', compact('result', 'search'));
        }
        if (!($request->ajax()) && $request->page_form_name == 'spatii_industriale_vinzare') {
            return view('page.industriale-vinzare', compact('result', 'search'));
        }
        if (!($request->ajax()) && $request->page_form_name == 'terenuri_vinzare') {
            return view('page.terenuri-vinzare', compact('result', 'search'));
        }
        if (!($request->ajax()) && $request->page_form_name == 'garaje_vinzare') {
            return view('page.garaje-vinzare', compact('result', 'search'));
        }
        if (!($request->ajax()) && $request->page_form_name == 'altele_vinzare') {
            return view('page.altele-vinzare', compact('result', 'search'));
        }
    }

    public function apartamenteArenda()
    {
        $result = Apartamente::where('tip', 'Arendă')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';
        $tip = 'arenda';

        return view('page.apartamente-vinzare', compact('result', 'search', 'tip'));
    }

    public function apartamentId($id)
    {
    	$result = Apartamente::where('id', $id)->get();
		
		foreach ( $result as $r ){
			// utilitati generale
			if ( 
				$r->utilitati_electricitate == 1 || 
				$r->utilitati_apeduct == 1 || 
				$r->utilitati_gazificat == 1 ) {
				
				$utilitati_generale = true;
			} else {
				$utilitati_generale = false;
			}
			// sisteme de incalzire
			if ( 
				$r->incalzire_centralizata == 1 || 
				$r->incalzire_autonoma == 1 ) {
				
				$sisteme_de_incalzire = true;
			} else {
				$sisteme_de_incalzire = false;
			}
			// alte utilitati
			if ( 
				$r->utilitati_climatizare == 1 || 
				$r->incalzire_autonoma == 1 || 
				$r->utilitati_acces_internet == 1 || 
				$r->utilitati_interfon == 1 || 
				$r->utilitati_ascensor == 1 || 
				$r->utilitati_supraveghere_video == 1 || 
				$r->utilitati_sistem_antiincendiar == 1 ) {
				
				$alte_utilitati = true;
			} else {
				$alte_utilitati = false;
			}
			// ferestre
			if ( 
				$r->ferestre_termopan == 1 || 
				$r->ferestre_lemn == 1 || 
				$r->ferestre_metal == 1 || 
				$r->ferestre_vitralii == 1 ) {
				
				$ferestre = true;
			} else {
				$ferestre = false;
			}
			// usi de interior
			if ( 
				$r->usi_de_interior_lemn == 1 || 
				$r->usi_de_interior_mdf == 1 || 
				$r->usi_de_interior_termopan == 1 || 
				$r->usi_de_interior_metal == 1 || 
				$r->usi_de_interior_extensibile == 1 ) {
				
				$usi_de_interior = true;
			} else {
				$usi_de_interior = false;
			}
			// usi de exterior
			if ( 
				$r->usi_de_exterior_lemn == 1 || 
				$r->usi_de_exterior_mdf == 1 || 
				$r->usi_de_exterior_termopan == 1 || 
				$r->usi_de_exterior_metal == 1 || 
				$r->usi_de_exterior_bronate == 1 || 
				$r->usi_de_exterior_culisante == 1 ) {
				
				$usi_de_exterior = true;
			} else {
				$usi_de_exterior = false;
			}
			// peretii interiori
			if ( 
				$r->peretii_interiori_tapete == 1 || 
				$r->peretii_interiori_tapete_decorative == 1 || 
				$r->peretii_interiori_gresie == 1 || 
				$r->peretii_interiori_lambriuri_din_lemn == 1 || 
				$r->peretii_interiori_lambriuri_din_pvc == 1 || 
				$r->peretii_interiori_glet == 1 || 
				$r->peretii_interiori_tencuiala_decorativa == 1 || 
				$r->peretii_interiori_gips_carton == 1 || 
				$r->peretii_interiori_placaj == 1 ) {
				
				$peretii_interiori = true;
			} else {
				$peretii_interiori = false;
			}
			// peretii exteriori
			if ( 
				$r->peretii_exteriori_tencuiala_decorativa == 1 || 
				$r->peretii_exteriori_mozaic == 1 || 
				$r->peretii_exteriori_gresie == 1 || 
				$r->peretii_exteriori_lambriuri_din_pvc == 1 || 
				$r->peretii_exteriori_lambriuri_din_lemn == 1 || 
				$r->peretii_exteriori_peretii_exteriori_ciment == 1 || 
				$r->peretii_exteriori_peretii_exteriori_termoizolata_cu_vata_minerala == 1 || 
				$r->peretii_exteriori_peretii_exteriori_termoizolata_cu_polistiren == 1 || 
				$r->peretii_exteriori_peretii_exteriori_piatra_decorativa == 1 || 
				$r->peretii_exteriori_peretii_exteriori_palacaj == 1 || 
				$r->peretii_exteriori_peretii_exteriori_fatada_ventilata == 1 || 
				$r->peretii_exteriori_arhitectura_istorica == 1 ) {
				
				$peretii_exteriori = true;
			} else {
				$peretii_exteriori = false;
			}
			// tavane
			if ( 
				$r->tavane_extensibile == 1 || 
				$r->tavane_suspendate == 1 || 
				$r->tavane_tencuiala == 1 || 
				$r->tavane_lambriuri_din_pvc == 1 || 
				$r->tavane_gips_carton == 1 || 
				$r->tavane_placaj == 1 ) {
				
				$tavane = true;
			} else {
				$tavane = false;
			}
			// acoperiri
			if ( 
				$r->acoperiri_gresie == 1 || 
				$r->acoperiri_parchet == 1 || 
				$r->acoperiri_linoleum == 1 || 
				$r->acoperiri_laminat == 1 || 
				$r->acoperiri_lemn == 1 || 
				$r->acoperiri_ciment == 1 || 
				$r->acoperiri_industriale == 1 || 
				$r->acoperiri_covor == 1 || 
				$r->acoperiri_epoxidice == 1 || 
				$r->acoperiri_elastice == 1 ) {
				
				$acoperiri = true;
			} else {
				$acoperiri = false;
			}
            
            $pret_min = $r->pret-2000;
            $pret_max = $r->pret+2000;
		}
//		return var_dump($usi_de_exterior); 
        
        $oferte_similare = Apartamente::where('publicat', 1)
                ->where('foto_1', '!=', '')
                ->whereBetween('pret', [$pret_min, $pret_max])
                ->take(30)->get();
        
    	return view('page.apartament', compact(
			'result', 
			'utilitati_generale',
			'sisteme_de_incalzire',
			'alte_utilitati',
			'ferestre',
			'usi_de_interior',
			'usi_de_exterior',
			'peretii_interiori',
			'peretii_exteriori',
			'tavane',
			'acoperiri',
            'oferte_similare'
		));
    }

    // Case si vile
    public function caseVinzare()
    {
        $result = Case_si_vile::where('tip', 'Vînzare')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';
        
        return view('page.case-vinzare', compact('result', 'search'));
    }

    public function caseArenda()
    {
        $result = Case_si_vile::where('tip', 'Arendă')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';
        $tip = 'arenda';

        return view('page.case-vinzare', compact('result', 'search', 'tip'));
    }

    public function casaId($id)
    {
        $result = Case_si_vile::where('id', $id)->get();
		
		foreach ( $result as $r ){
			// utilitati generale
			if ( 
				$r->utilitati_electricitate == 1 || 
				$r->utilitati_apeduct == 1 || 
				$r->utilitati_gazificat == 1 ) {
				
				$utilitati_generale = true;
			} else {
				$utilitati_generale = false;
			}
			// sisteme de incalzire
			if ( 
				$r->incalzire_centralizata == 1 || 
				$r->incalzire_autonoma == 1 ) {
				
				$sisteme_de_incalzire = true;
			} else {
				$sisteme_de_incalzire = false;
			}
			// alte utilitati
			if ( 
				$r->utilitati_climatizare == 1 || 
				$r->incalzire_autonoma == 1 || 
				$r->utilitati_acces_internet == 1 || 
				$r->utilitati_interfon == 1 || 
				$r->utilitati_ascensor == 1 || 
				$r->utilitati_supraveghere_video == 1 || 
				$r->utilitati_sistem_antiincendiar == 1 ) {
				
				$alte_utilitati = true;
			} else {
				$alte_utilitati = false;
			}
			// ferestre
			if ( 
				$r->ferestre_termopan == 1 || 
				$r->ferestre_lemn == 1 || 
				$r->ferestre_metal == 1 || 
				$r->ferestre_vitralii == 1 ) {
				
				$ferestre = true;
			} else {
				$ferestre = false;
			}
			// usi de interior
			if ( 
				$r->usi_de_interior_lemn == 1 || 
				$r->usi_de_interior_mdf == 1 || 
				$r->usi_de_interior_termopan == 1 || 
				$r->usi_de_interior_metal == 1 || 
				$r->usi_de_interior_extensibile == 1 ) {
				
				$usi_de_interior = true;
			} else {
				$usi_de_interior = false;
			}
			// usi de exterior
			if ( 
				$r->usi_de_exterior_lemn == 1 || 
				$r->usi_de_exterior_mdf == 1 || 
				$r->usi_de_exterior_termopan == 1 || 
				$r->usi_de_exterior_metal == 1 || 
				$r->usi_de_exterior_bronate == 1 || 
				$r->usi_de_exterior_culisante == 1 ) {
				
				$usi_de_exterior = true;
			} else {
				$usi_de_exterior = false;
			}
			// peretii interiori
			if ( 
				$r->peretii_interiori_tapete == 1 || 
				$r->peretii_interiori_tapete_decorative == 1 || 
				$r->peretii_interiori_gresie == 1 || 
				$r->peretii_interiori_lambriuri_din_lemn == 1 || 
				$r->peretii_interiori_lambriuri_din_pvc == 1 || 
				$r->peretii_interiori_glet == 1 || 
				$r->peretii_interiori_tencuiala_decorativa == 1 || 
				$r->peretii_interiori_gips_carton == 1 || 
				$r->peretii_interiori_placaj == 1 ) {
				
				$peretii_interiori = true;
			} else {
				$peretii_interiori = false;
			}
			// peretii exteriori
			if ( 
				$r->peretii_exteriori_tencuiala_decorativa == 1 || 
				$r->peretii_exteriori_mozaic == 1 || 
				$r->peretii_exteriori_gresie == 1 || 
				$r->peretii_exteriori_lambriuri_din_pvc == 1 || 
				$r->peretii_exteriori_lambriuri_din_lemn == 1 || 
				$r->peretii_exteriori_peretii_exteriori_ciment == 1 || 
				$r->peretii_exteriori_peretii_exteriori_termoizolata_cu_vata_minerala == 1 || 
				$r->peretii_exteriori_peretii_exteriori_termoizolata_cu_polistiren == 1 || 
				$r->peretii_exteriori_peretii_exteriori_piatra_decorativa == 1 || 
				$r->peretii_exteriori_peretii_exteriori_palacaj == 1 || 
				$r->peretii_exteriori_peretii_exteriori_fatada_ventilata == 1 || 
				$r->peretii_exteriori_arhitectura_istorica == 1 ) {
				
				$peretii_exteriori = true;
			} else {
				$peretii_exteriori = false;
			}
			// tavane
			if ( 
				$r->tavane_extensibile == 1 || 
				$r->tavane_suspendate == 1 || 
				$r->tavane_tencuiala == 1 || 
				$r->tavane_lambriuri_din_pvc == 1 || 
				$r->tavane_gips_carton == 1 || 
				$r->tavane_placaj == 1 ) {
				
				$tavane = true;
			} else {
				$tavane = false;
			}
			// acoperiri
			if ( 
				$r->acoperiri_gresie == 1 || 
				$r->acoperiri_parchet == 1 || 
				$r->acoperiri_linoleum == 1 || 
				$r->acoperiri_laminat == 1 || 
				$r->acoperiri_lemn == 1 || 
				$r->acoperiri_ciment == 1 || 
				$r->acoperiri_industriale == 1 || 
				$r->acoperiri_covor == 1 || 
				$r->acoperiri_epoxidice == 1 || 
				$r->acoperiri_elastice == 1 ) {
				
				$acoperiri = true;
			} else {
				$acoperiri = false;
			}
		}
//		return var_dump($usi_de_exterior);
    	return view('page.casa', compact(
			'result', 
			'utilitati_generale',
			'sisteme_de_incalzire',
			'alte_utilitati',
			'ferestre',
			'usi_de_interior',
			'usi_de_exterior',
			'peretii_interiori',
			'peretii_exteriori',
			'tavane',
			'acoperiri'
		));
    }

    // Comerciale
    public function comercialeVinzare()
    {
        $result = Comerciale::where('tip', 'Vînzare')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';

        return view('page.comerciale-vinzare', compact('result', 'search'));
    }

    public function comercialeArenda()
    {
        $result = Comerciale::where('tip', 'Arendă')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';
        $tip = 'arenda';

        return view('page.comerciale-vinzare', compact('result', 'search', 'tip'));
    }

    public function comercialId($id)
    {
        $result = Comerciale::where('id', $id)->get();
		
		foreach ( $result as $r ){
			// utilitati generale
			if ( 
				$r->utilitati_electricitate == 1 || 
				$r->utilitati_apeduct == 1 || 
				$r->utilitati_gazificat == 1 ) {
				
				$utilitati_generale = true;
			} else {
				$utilitati_generale = false;
			}
			// sisteme de incalzire
			if ( 
				$r->incalzire_centralizata == 1 || 
				$r->incalzire_autonoma == 1 ) {
				
				$sisteme_de_incalzire = true;
			} else {
				$sisteme_de_incalzire = false;
			}
			// alte utilitati
			if ( 
				$r->utilitati_climatizare == 1 || 
				$r->incalzire_autonoma == 1 || 
				$r->utilitati_acces_internet == 1 || 
				$r->utilitati_interfon == 1 || 
				$r->utilitati_ascensor == 1 || 
				$r->utilitati_supraveghere_video == 1 || 
				$r->utilitati_sistem_antiincendiar == 1 ) {
				
				$alte_utilitati = true;
			} else {
				$alte_utilitati = false;
			}
			// ferestre
			if ( 
				$r->ferestre_termopan == 1 || 
				$r->ferestre_lemn == 1 || 
				$r->ferestre_metal == 1 || 
				$r->ferestre_vitralii == 1 ) {
				
				$ferestre = true;
			} else {
				$ferestre = false;
			}
			// usi de interior
			if ( 
				$r->usi_de_interior_lemn == 1 || 
				$r->usi_de_interior_mdf == 1 || 
				$r->usi_de_interior_termopan == 1 || 
				$r->usi_de_interior_metal == 1 || 
				$r->usi_de_interior_extensibile == 1 ) {
				
				$usi_de_interior = true;
			} else {
				$usi_de_interior = false;
			}
			// usi de exterior
			if ( 
				$r->usi_de_exterior_lemn == 1 || 
				$r->usi_de_exterior_mdf == 1 || 
				$r->usi_de_exterior_termopan == 1 || 
				$r->usi_de_exterior_metal == 1 || 
				$r->usi_de_exterior_bronate == 1 || 
				$r->usi_de_exterior_culisante == 1 ) {
				
				$usi_de_exterior = true;
			} else {
				$usi_de_exterior = false;
			}
			// peretii interiori
			if ( 
				$r->peretii_interiori_tapete == 1 || 
				$r->peretii_interiori_tapete_decorative == 1 || 
				$r->peretii_interiori_gresie == 1 || 
				$r->peretii_interiori_lambriuri_din_lemn == 1 || 
				$r->peretii_interiori_lambriuri_din_pvc == 1 || 
				$r->peretii_interiori_glet == 1 || 
				$r->peretii_interiori_tencuiala_decorativa == 1 || 
				$r->peretii_interiori_gips_carton == 1 || 
				$r->peretii_interiori_placaj == 1 ) {
				
				$peretii_interiori = true;
			} else {
				$peretii_interiori = false;
			}
			// peretii exteriori
			if ( 
				$r->peretii_exteriori_tencuiala_decorativa == 1 || 
				$r->peretii_exteriori_mozaic == 1 || 
				$r->peretii_exteriori_gresie == 1 || 
				$r->peretii_exteriori_lambriuri_din_pvc == 1 || 
				$r->peretii_exteriori_lambriuri_din_lemn == 1 || 
				$r->peretii_exteriori_peretii_exteriori_ciment == 1 || 
				$r->peretii_exteriori_peretii_exteriori_termoizolata_cu_vata_minerala == 1 || 
				$r->peretii_exteriori_peretii_exteriori_termoizolata_cu_polistiren == 1 || 
				$r->peretii_exteriori_peretii_exteriori_piatra_decorativa == 1 || 
				$r->peretii_exteriori_peretii_exteriori_palacaj == 1 || 
				$r->peretii_exteriori_peretii_exteriori_fatada_ventilata == 1 || 
				$r->peretii_exteriori_arhitectura_istorica == 1 ) {
				
				$peretii_exteriori = true;
			} else {
				$peretii_exteriori = false;
			}
			// tavane
			if ( 
				$r->tavane_extensibile == 1 || 
				$r->tavane_suspendate == 1 || 
				$r->tavane_tencuiala == 1 || 
				$r->tavane_lambriuri_din_pvc == 1 || 
				$r->tavane_gips_carton == 1 || 
				$r->tavane_placaj == 1 ) {
				
				$tavane = true;
			} else {
				$tavane = false;
			}
			// acoperiri
			if ( 
				$r->acoperiri_gresie == 1 || 
				$r->acoperiri_parchet == 1 || 
				$r->acoperiri_linoleum == 1 || 
				$r->acoperiri_laminat == 1 || 
				$r->acoperiri_lemn == 1 || 
				$r->acoperiri_ciment == 1 || 
				$r->acoperiri_industriale == 1 || 
				$r->acoperiri_covor == 1 || 
				$r->acoperiri_epoxidice == 1 || 
				$r->acoperiri_elastice == 1 ) {
				
				$acoperiri = true;
			} else {
				$acoperiri = false;
			}
		}
//		return var_dump($usi_de_exterior);
    	return view('page.comercial', compact(
			'result', 
			'utilitati_generale',
			'sisteme_de_incalzire',
			'alte_utilitati',
			'ferestre',
			'usi_de_interior',
			'usi_de_exterior',
			'peretii_interiori',
			'peretii_exteriori',
			'tavane',
			'acoperiri'
		));
    }

    // Comerciale
    public function industrialeVinzare()
    {
        $result = Industriale::where('tip', 'Vînzare')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';

        return view('page.industriale-vinzare', compact('result', 'search'));
    }

    public function industrialeArenda()
    {
        $result = Industriale::where('tip', 'Arendă')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';
        $tip = 'arenda';

        return view('page.industriale-vinzare', compact('result', 'search', 'tip'));
    }

    public function industrialId($id)
    {
        $result = Industriale::where('id', $id)->get();
		
		foreach ( $result as $r ){
			// utilitati generale
			if ( 
				$r->utilitati_electricitate == 1 || 
				$r->utilitati_apeduct == 1 || 
				$r->utilitati_gazificat == 1 ) {
				
				$utilitati_generale = true;
			} else {
				$utilitati_generale = false;
			}
			// sisteme de incalzire
			if ( 
				$r->incalzire_centralizata == 1 || 
				$r->incalzire_autonoma == 1 ) {
				
				$sisteme_de_incalzire = true;
			} else {
				$sisteme_de_incalzire = false;
			}
			// alte utilitati
			if ( 
				$r->utilitati_climatizare == 1 || 
				$r->incalzire_autonoma == 1 || 
				$r->utilitati_acces_internet == 1 || 
				$r->utilitati_interfon == 1 || 
				$r->utilitati_ascensor == 1 || 
				$r->utilitati_supraveghere_video == 1 || 
				$r->utilitati_sistem_antiincendiar == 1 ) {
				
				$alte_utilitati = true;
			} else {
				$alte_utilitati = false;
			}
			// ferestre
			if ( 
				$r->ferestre_termopan == 1 || 
				$r->ferestre_lemn == 1 || 
				$r->ferestre_metal == 1 || 
				$r->ferestre_vitralii == 1 ) {
				
				$ferestre = true;
			} else {
				$ferestre = false;
			}
			// usi de interior
			if ( 
				$r->usi_de_interior_lemn == 1 || 
				$r->usi_de_interior_mdf == 1 || 
				$r->usi_de_interior_termopan == 1 || 
				$r->usi_de_interior_metal == 1 || 
				$r->usi_de_interior_extensibile == 1 ) {
				
				$usi_de_interior = true;
			} else {
				$usi_de_interior = false;
			}
			// usi de exterior
			if ( 
				$r->usi_de_exterior_lemn == 1 || 
				$r->usi_de_exterior_mdf == 1 || 
				$r->usi_de_exterior_termopan == 1 || 
				$r->usi_de_exterior_metal == 1 || 
				$r->usi_de_exterior_bronate == 1 || 
				$r->usi_de_exterior_culisante == 1 ) {
				
				$usi_de_exterior = true;
			} else {
				$usi_de_exterior = false;
			}
			// peretii interiori
			if ( 
				$r->peretii_interiori_tapete == 1 || 
				$r->peretii_interiori_tapete_decorative == 1 || 
				$r->peretii_interiori_gresie == 1 || 
				$r->peretii_interiori_lambriuri_din_lemn == 1 || 
				$r->peretii_interiori_lambriuri_din_pvc == 1 || 
				$r->peretii_interiori_glet == 1 || 
				$r->peretii_interiori_tencuiala_decorativa == 1 || 
				$r->peretii_interiori_gips_carton == 1 || 
				$r->peretii_interiori_placaj == 1 ) {
				
				$peretii_interiori = true;
			} else {
				$peretii_interiori = false;
			}
			// peretii exteriori
			if ( 
				$r->peretii_exteriori_tencuiala_decorativa == 1 || 
				$r->peretii_exteriori_mozaic == 1 || 
				$r->peretii_exteriori_gresie == 1 || 
				$r->peretii_exteriori_lambriuri_din_pvc == 1 || 
				$r->peretii_exteriori_lambriuri_din_lemn == 1 || 
				$r->peretii_exteriori_peretii_exteriori_ciment == 1 || 
				$r->peretii_exteriori_peretii_exteriori_termoizolata_cu_vata_minerala == 1 || 
				$r->peretii_exteriori_peretii_exteriori_termoizolata_cu_polistiren == 1 || 
				$r->peretii_exteriori_peretii_exteriori_piatra_decorativa == 1 || 
				$r->peretii_exteriori_peretii_exteriori_palacaj == 1 || 
				$r->peretii_exteriori_peretii_exteriori_fatada_ventilata == 1 || 
				$r->peretii_exteriori_arhitectura_istorica == 1 ) {
				
				$peretii_exteriori = true;
			} else {
				$peretii_exteriori = false;
			}
			// tavane
			if ( 
				$r->tavane_extensibile == 1 || 
				$r->tavane_suspendate == 1 || 
				$r->tavane_tencuiala == 1 || 
				$r->tavane_lambriuri_din_pvc == 1 || 
				$r->tavane_gips_carton == 1 || 
				$r->tavane_placaj == 1 ) {
				
				$tavane = true;
			} else {
				$tavane = false;
			}
			// acoperiri
			if ( 
				$r->acoperiri_gresie == 1 || 
				$r->acoperiri_parchet == 1 || 
				$r->acoperiri_linoleum == 1 || 
				$r->acoperiri_laminat == 1 || 
				$r->acoperiri_lemn == 1 || 
				$r->acoperiri_ciment == 1 || 
				$r->acoperiri_industriale == 1 || 
				$r->acoperiri_covor == 1 || 
				$r->acoperiri_epoxidice == 1 || 
				$r->acoperiri_elastice == 1 ) {
				
				$acoperiri = true;
			} else {
				$acoperiri = false;
			}
		}
//		return var_dump($usi_de_exterior);
    	return view('page.industrial', compact(
			'result', 
			'utilitati_generale',
			'sisteme_de_incalzire',
			'alte_utilitati',
			'ferestre',
			'usi_de_interior',
			'usi_de_exterior',
			'peretii_interiori',
			'peretii_exteriori',
			'tavane',
			'acoperiri'
		));
    }

    // Terenuri
    public function terenuriVinzare()
    {
        $result = Terenuri::where('tip', 'Vînzare')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';

        return view('page.terenuri-vinzare', compact('result', 'search'));
    }

    public function terenuriArenda()
    {
        $result = Terenuri::where('tip', 'Arendă')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';
        $tip = 'arenda';

        return view('page.terenuri-vinzare', compact('result', 'search', 'tip'));
    } 

    public function terenId($id)
    {
        $result = Terenuri::where('id', $id)->get();

        return view('page.teren', compact('result'));
    }

    // Garaje
    public function garajeVinzare()
    {
        $result = Garaje::where('tip', 'Vînzare')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';

        return view('page.garaje-vinzare', compact('result', 'search'));
    }

    public function garajeArenda()
    {
        $result = Garaje::where('tip', 'Arendă')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';
        $tip = 'arenda';

        return view('page.garaje-vinzare', compact('result', 'search', 'tip'));
    }

    public function garajId($id)
    {
        $result = Garaje::where('id', $id)->get();

        return view('page.garaj', compact('result'));
    }
    // Altele
    public function alteleVinzare()
    {
        $result = Altele::where('tip', 'Vînzare')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';

        return view('page.altele-vinzare', compact('result', 'search'));
    }

    public function alteleArenda()
    {
        $result = Altele::where('tip', 'Arendă')->where('publicat', 1)->orderBy('id', 'DESC')->paginate(20);
        $search = 'no';
        $tip = 'arenda';

        return view('page.altele-vinzare', compact('result', 'search', 'tip'));
    }

    public function alteleId($id)
    {
        $result = Altele::where('id', $id)->get();

        return view('page.altele', compact('result'));
    }

    // Other page
    public function proiectare()
    {
        $pages = Pages::where('slug', 'proiectare')->get();
        return view('page.other.proiectare', compact('pages'));
    }
    public function evaluare()
    {
        $pages = Pages::where('slug', 'evaluare')->get();
        return view('page.other.evaluare', compact('pages'));
    }

    public function complexeRezidentiale()
    {
        $result = ComplexeRezidentiale::orderBy('id', 'DESC')->paginate(20);
        $tip_imobil = TipImobil::all();
        $search = 'no';

        return view('page.other.complexe-rezidentiale', compact('result', 'tip_imobil', 'search'));
    }
    public function complexRezidentialId($id)
    {
        $r = ComplexeRezidentiale::where('id', $id)->first();
        $tip_imobil = TipImobil::where('complexul_rezidential', $r->titlu_ro)->get();

        return view('page.complex-rezidential', compact('r', 'tip_imobil', 'get'));
    }

    public function ipoteca()
    {
        $pages = Pages::where('slug', 'ipoteca')->get();
        return view('page.other.ipoteca', compact('pages'));
    }
    public function contacte()
    {
        $pages = Pages::where('slug', 'contacte')->get();
        return view('page.other.contacte', compact('pages'));
    }
    public function despreCompanie()
    {
        $pages = Pages::where('slug', 'despre-companie')->get();
        return view('page.other.despre-companie', compact('pages'));
    }
    public function noutati()
    {
        $noutati = Noutati::all();
        return view('page.other.noutati', compact('noutati'));
    }
    public function noutatiId($id)
    {
        $noutate = Noutati::where('id', $id)->first();
        return view('page.other.noutate', compact('noutate'));
    }
    public function informatiiUtile()
    {
        $informatii = InformatiiUtile::all();
        return view('page.other.informatii-utile', compact('informatii'));
    }
    public function informatiiUtileId($id)
    {
        $informatii = InformatiiUtile::where('id', $id)->first();
        return view('page.other.informatie-utila', compact('informatii'));
    }
    public function posturiVacante()
    {
        $pages = Pages::where('slug', 'posturi-vacante')->get();
        return view('page.other.posturi-vacante', compact('pages'));
    }
    public function finantare()
    {
        $pages = Pages::where('slug', 'finantare')->get();
        return view('page.other.finantare', compact('pages'));
    }
    public function parteneri()
    {
        $pages = Pages::where('slug', 'parteneri')->get();
        return view('page.other.parteneri', compact('pages'));
    }
    public function cumparareUrgenta()
    {
        $pages = Pages::where('slug', 'cumparare-urgenta')->get();
        return view('page.other.cumparare-urgenta', compact('pages'));
    }
    public function serviciileNoastre()
    {
        $pages = Pages::where('slug', 'serviciile-noastre')->get();
        return view('page.other.serviciile-noastre', compact('pages'));
    }
    public function evaluareMenu()
    {
        $pages = Pages::where('slug', 'evaluare')->get();

        return view('page.other.evaluare-menu', compact('pages'));
    }

    public function getPage($slug) {
        $pages = Pages::where('slug', $slug)->get();

        return view('page.other.evaluare-menu', compact('pages'));
    }

    public function mobileArenda()
    {
        $oferte_noi = Apartamente::where('locuinte_noi', 1)->where('foto_1', '!=', '')->take(8)->get();
        $ofertele_noastre = Apartamente::where('ofertele_noastre', 1)->where('foto_1', '!=', '')->take(4)->get();

        return view('page.mobile.mobile-arenda', compact('oferte_noi', 'ofertele_noastre'));
    }
    public function mobileVinzare()
    {
        $oferte_noi = Apartamente::where('locuinte_noi', 1)->where('foto_1', '!=', '')->take(8)->get();
        $ofertele_noastre = Apartamente::where('ofertele_noastre', 1)->where('foto_1', '!=', '')->take(4)->get();

        return view('page.mobile.mobile-vinzare', compact('oferte_noi', 'ofertele_noastre'));
    }
    public function mobileFinantare()
    {
        $oferte_noi = Apartamente::where('locuinte_noi', 1)->where('foto_1', '!=', '')->take(8)->get();
        $ofertele_noastre = Apartamente::where('ofertele_noastre', 1)->where('foto_1', '!=', '')->take(4)->get();

        return view('page.mobile.mobile-finantare', compact('oferte_noi', 'ofertele_noastre'));
    }

    public function star(Request $request)
    {
        if (isset($request->delete_star) && $request->delete_star == 'yes') {
            $category = $request->category;
            $id = (int)$request->id;

            foreach (session($category) as $key => $value) {
                if ($value == $id) {
                    session()->forget($category.'.'.$key);
                }
            }

            return response()->json(['res1' => $category, 'res2' => $id]);
        } else {
            $category = $request->category;
            $id = (int)$request->id;

            $apartamente = $case = $comerciale = $industriale = $terenuri = $garaje = '';
            
            if ($category == 'apartamente') session()->push('apartamente', $id);
            if ($category == 'case') session()->push('case', $id);
            if ($category == 'comerciale') session()->push('comerciale', $id);
            if ($category == 'industriale') session()->push('industriale', $id);
            if ($category == 'terenuri') session()->push('terenuri', $id);
            if ($category == 'garaje') session()->push('garaje', $id);
            if ($category == 'altele') session()->push('altele', $id);

            // $array_apartamente = session('apartamente');


            // $apartamente = Apartamente::whereIn('id', $array_apartamente)->get();
            // $case = Case_si_vile::whereIn('id', session('case'))->get();
            // $comerciale = Comerciale::whereIn('id', session('comerciale'))->get();
            // $industriale = Industriale::whereIn('id', session('industriale'))->get();
            // $terenuri = Terenuri::whereIn('id', session('terenuri'))->get();
            // $garaje = Garaje::whereIn('id', session('garaje'))->get();
            // $case = Case_si_vile::whereIn('id', session('apartamente'))->get();

            $array_apartamente = session('apartamente');
            $array_case = session('case');
            $array_comerciale = session('comerciale');
            $array_industriale = session('industriale');
            $array_terenuri = session('terenuri');
            $array_garaje = session('garaje');
            $array_altele = session('altele');
            
            if ( session()->has('apartamente') ) $apartamente = Apartamente::whereIn('id', $array_apartamente)->get();
            if ( session()->has('case') ) $case = Case_si_vile::whereIn('id', $array_case)->get();
            if ( session()->has('comerciale') ) $comerciale = Comerciale::whereIn('id', $array_comerciale)->get();
            if ( session()->has('industriale') ) $industriale = Industriale::whereIn('id', $array_industriale)->get();
            if ( session()->has('terenuri') ) $terenuri = Terenuri::whereIn('id', $array_terenuri)->get();
            if ( session()->has('garaje') ) $garaje = Garaje::whereIn('id', $array_garaje)->get();
            if ( session()->has('altele') ) $altele = Altele::whereIn('id', $array_altele)->get();

            return response()->json([
                'res1' => $apartamente, 
                'res2' => $case,
                'res3' => $comerciale,
                'res4' => $industriale,
                'res5' => $terenuri,
                'res6' => $garaje
            ]);
        }
    }

    public function feedXml()
    {
        // apartamente = 1
        // case si vile = 2
        // comerciale = 3
        // garaje = 4
        // industriale = 5
        // terenuri = 6

        $apartamente = Apartamente::all();

        $xml = '<?xml version="1.0" encoding="utf-8"?><import>'."\n";
        $xml.= '<listings>';

        foreach ( $apartamente as $a ) {
            if ( $a->tip == 'Vînzare' ) $transactionTypeId = 2;
            if ( $a->tip == 'Arendă' ) $transactionTypeId = 1;

            if ( $a->sector == 'Botanica' ) $district = 6231;
            if ( $a->sector == 'Buiucani' ) $district = 7593;
            if ( $a->sector == 'Centru' ) $district = 6299;
            if ( $a->sector == 'Ciocana' ) $district = 6306;
            if ( $a->sector == 'Durlești' ) $district = 7594;
            if ( $a->sector == 'Poșta Veche' ) $district = 7596;
            if ( $a->sector == 'Rîșcani' ) $district = 7223;
            if ( $a->sector == 'Sculeni' ) $district = 7595;
            if ( $a->sector == 'Telecentru' ) $district = 7597;
            if ( $a->sector == 'Chișinău suburbii' ) $district = 6299;
            if ( $a->sector == 'Alte localități' ) $district = 6299;

            $photos = json_decode($a->foto_2);

            $xml.= '<listing id="1'.$a->id.'" type="1" state="active">'."\n";

            $xml.= '<transactionTypeId>'.$transactionTypeId.'</transactionTypeId>'."\n";
            $xml.= '<countryId>4</countryId>'."\n";
            $xml.= '<regionId>251</regionId>'."\n";
            $xml.= '<districtId>'.$district.'</districtId>'."\n";
            $xml.= '<street>'.$a->street_ru.'</street>'."\n";
            $xml.= '<floor>'.$a->nivelul.'</floor>'."\n";
            $xml.= '<floorCount>'.$a->numar_de_nivele.'</floorCount>'."\n";
            $xml.= '<roomCount>'.$a->numar_de_camere.'</roomCount>'."\n";
            $xml.= '<areaGeneral>'.$a->suprafata_totala.'</areaGeneral>'."\n";

            $xml.= '<addInfo>'.$a->titlu_ru.'</addInfo>'."\n";

            if ( $photos != null ) {
                $xml.= '<photos>'."\n";
                    foreach ( $photos as $p ) {
                        $xml.='<photo>http://lesternau.md/img/'.$p.'</photo>'."\n";
                    }
                $xml.= '</photos>'."\n";
            }

            $xml.= '<price>'.$a->pret.'</price>'."\n";
            $xml.= '<priceTypeId>1</priceTypeId>';
            $xml.= '<currencyId>2</currencyId>';

            $xml.= '<contactName>Lesternau</contactName>'."\n";
            $xml.= '<contactPhone>+373 (68) 611 611</contactPhone>'."\n";
            $xml.= '<contactEmail>office@lesternau.md</contactEmail>'."\n";
            $xml.= '<userUrl>www.lesternau.md</userUrl>'."\n";

            $xml.= '</listing>'."\n";
        }
        $xml.= '</listings>';
        $xml.= '</import>';

        Storage::disk('local')->put('import.xml', $xml);
    }

    public function import()
    {
        echo Storage::url('import.xml');
    }

    public function parse()
    {
        $string = file_get_contents('http://bnm.md/');

        return $string;
    }
    
}
