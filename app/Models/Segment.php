<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'serial_number',
        'hero_section_title',
        'hero_section_subtitle',
        'hero_section_text',
        'hero_section_button_text',
        'hero_section_button_url',
        'hero_section_secound_button_text',
        'hero_section_secound_button_url',
        'hero_img',
        'hero_img2',
        'hero_img3',
        'hero_img4',
        'hero_img5',
        'custom_css',
        'custom_js'
    ];

    /**
     * Relacionamento com Packages
     */
    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    /**
     * Relacionamento com Features
     */
    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    /**
     * Relacionamento com Processes
     */
    public function processes()
    {
        return $this->hasMany(Process::class);
    }

    /**
     * Relacionamento com Testimonials
     */
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    /**
     * Relacionamento com Partners
     */
    public function partners()
    {
        return $this->hasMany(Partner::class);
    }

    /**
     * Scope para segmentos ativos
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope para ordenação
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('serial_number', 'ASC');
    }

    /**
     * Buscar segmento por slug
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->where('status', 1)->first();
    }

    /**
     * Verificar se o segmento está ativo
     */
    public function isActive()
    {
        return $this->status == 1;
    }

    /**
     * Obter URL do segmento
     */
    public function getUrlAttribute()
    {
        return url('/' . $this->slug);
    }
}
