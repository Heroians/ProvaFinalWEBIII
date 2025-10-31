<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Campos que podem ser preenchidos em massa (mass assignment)
     * Ao adicionar 'role', permitimos que ele seja definido no cadastro (ex: 'admin' ou 'user')
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Campos que devem ser ocultos quando o modelo for convertido em array ou JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversões de tipos automáticas de atributos
     * Exemplo: transforma email_verified_at em datetime
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // o Laravel faz o hash automaticamente ao salvar
        ];
    }
}
