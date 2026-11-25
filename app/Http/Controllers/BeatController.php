<?php

namespace App\Http\Controllers;

use App\Models\Beat;
use Illuminate\Http\Request;

class BeatController extends Controller
{
    /**
     * Отображение каталога битов с поиском и сортировкой (Функции 2, 3, 5 из ТЗ)
     */
    public function index(Request $request)
    {
        // Начинаем построение запроса к таблице beats
        $query = Beat::query();

        // Функция 2: Поиск по названию или тегам (ILIKE для PostgreSQL - регистронезависимый поиск)
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'ILIKE', "%{$search}%")
                  ->orWhereHas('tags', function($tagQuery) use ($search) {
                      $tagQuery->where('name', 'ILIKE', "%{$search}%");
                  });
            });
        }

        // Функция 3: Сортировка по времени (duration), темпу (bpm) или цене (price)
        if ($request->has('sort_by')) {
            $sortBy = $request->sort_by;
            $order = $request->sort_order === 'desc' ? 'desc' : 'asc';
            
            // Разрешаем сортировку только по безопасным полям
            if (in_array($sortBy, ['duration', 'bpm', 'price', 'created_at'])) {
                $query->orderBy($sortBy, $order);
            }
        } else {
            // Сортировка по умолчанию: сначала новые
            $query->orderBy('created_at', 'desc');
        }

        // Получаем биты и сразу подгружаем связанные теги (чтобы не было N+1 запросов)
        $beats = $query->with('tags')->get();

        // Передаем данные в представление
        return view('beats', compact('beats'));
    }
}