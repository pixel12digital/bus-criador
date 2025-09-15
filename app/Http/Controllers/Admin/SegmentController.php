<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Segment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class SegmentController extends Controller
{
    /**
     * Listar todos os segmentos
     */
    public function index()
    {
        $data['segments'] = Segment::orderBy('serial_number', 'ASC')->get();
        return view('admin.segments.index', $data);
    }

    /**
     * Mostrar formulário de criação
     */
    public function create()
    {
        return view('admin.segments.create');
    }

    /**
     * Salvar novo segmento
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:segments,slug',
            'description' => 'nullable',
            'status' => 'required|in:0,1',
            'serial_number' => 'required|integer|min:0',
            'hero_section_title' => 'nullable|max:255',
            'hero_section_subtitle' => 'nullable|max:255',
            'hero_section_text' => 'nullable',
            'hero_section_button_text' => 'nullable|max:255',
            'hero_section_button_url' => 'nullable|max:255',
            'hero_section_secound_button_text' => 'nullable|max:255',
            'hero_section_secound_button_url' => 'nullable|max:255',
            'hero_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_img2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_img3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_img4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_img5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'custom_css' => 'nullable',
            'custom_js' => 'nullable',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $segment = new Segment();
        $segment->name = $request->name;
        $segment->slug = $request->slug;
        $segment->description = $request->description;
        $segment->status = $request->status;
        $segment->serial_number = $request->serial_number;
        $segment->hero_section_title = $request->hero_section_title;
        $segment->hero_section_subtitle = $request->hero_section_subtitle;
        $segment->hero_section_text = $request->hero_section_text;
        $segment->hero_section_button_text = $request->hero_section_button_text;
        $segment->hero_section_button_url = $request->hero_section_button_url;
        $segment->hero_section_secound_button_text = $request->hero_section_secound_button_text;
        $segment->hero_section_secound_button_url = $request->hero_section_secound_button_url;
        $segment->custom_css = $request->custom_css;
        $segment->custom_js = $request->custom_js;

        // Upload de imagens
        $this->handleImageUpload($request, $segment);

        $segment->save();

        Session::flash('success', 'Segmento criado com sucesso!');
        return redirect()->route('admin.segments.index');
    }

    /**
     * Mostrar formulário de edição
     */
    public function edit($id)
    {
        $data['segment'] = Segment::findOrFail($id);
        return view('admin.segments.edit', $data);
    }

    /**
     * Atualizar segmento
     */
    public function update(Request $request, $id)
    {
        $segment = Segment::findOrFail($id);

        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:segments,slug,' . $id,
            'description' => 'nullable',
            'status' => 'required|in:0,1',
            'serial_number' => 'required|integer|min:0',
            'hero_section_title' => 'nullable|max:255',
            'hero_section_subtitle' => 'nullable|max:255',
            'hero_section_text' => 'nullable',
            'hero_section_button_text' => 'nullable|max:255',
            'hero_section_button_url' => 'nullable|max:255',
            'hero_section_secound_button_text' => 'nullable|max:255',
            'hero_section_secound_button_url' => 'nullable|max:255',
            'hero_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_img2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_img3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_img4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_img5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'custom_css' => 'nullable',
            'custom_js' => 'nullable',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $segment->name = $request->name;
        $segment->slug = $request->slug;
        $segment->description = $request->description;
        $segment->status = $request->status;
        $segment->serial_number = $request->serial_number;
        $segment->hero_section_title = $request->hero_section_title;
        $segment->hero_section_subtitle = $request->hero_section_subtitle;
        $segment->hero_section_text = $request->hero_section_text;
        $segment->hero_section_button_text = $request->hero_section_button_text;
        $segment->hero_section_button_url = $request->hero_section_button_url;
        $segment->hero_section_secound_button_text = $request->hero_section_secound_button_text;
        $segment->hero_section_secound_button_url = $request->hero_section_secound_button_url;
        $segment->custom_css = $request->custom_css;
        $segment->custom_js = $request->custom_js;

        // Upload de imagens
        $this->handleImageUpload($request, $segment);

        $segment->save();

        Session::flash('success', 'Segmento atualizado com sucesso!');
        return redirect()->route('admin.segments.index');
    }

    /**
     * Deletar segmento
     */
    public function destroy($id)
    {
        $segment = Segment::findOrFail($id);
        
        // Deletar imagens
        $this->deleteImages($segment);
        
        $segment->delete();

        Session::flash('success', 'Segmento deletado com sucesso!');
        return redirect()->route('admin.segments.index');
    }

    /**
     * Gerenciar upload de imagens
     */
    private function handleImageUpload(Request $request, Segment $segment)
    {
        $imageFields = ['hero_img', 'hero_img2', 'hero_img3', 'hero_img4', 'hero_img5'];
        
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Deletar imagem anterior se existir
                if ($segment->$field) {
                    @unlink(public_path('assets/front/img/' . $segment->$field));
                }
                
                // Upload nova imagem
                $filename = uniqid() . '.' . $request->file($field)->getClientOriginalExtension();
                $request->file($field)->move(public_path('assets/front/img/'), $filename);
                $segment->$field = $filename;
            }
        }
    }

    /**
     * Deletar imagens do segmento
     */
    private function deleteImages(Segment $segment)
    {
        $imageFields = ['hero_img', 'hero_img2', 'hero_img3', 'hero_img4', 'hero_img5'];
        
        foreach ($imageFields as $field) {
            if ($segment->$field) {
                @unlink(public_path('assets/front/img/' . $segment->$field));
            }
        }
    }
}
