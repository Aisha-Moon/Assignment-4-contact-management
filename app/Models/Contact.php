<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address'];

    public static function getRecord($request)
    {
        $query = self::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->get('name') . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->get('email') . '%');
        }


        $sort = $request->get('sort', 'name');
        $order = $request->get('order', 'asc');

        $query->orderBy($sort, $order);

        return $query->paginate(10);
    }
}
