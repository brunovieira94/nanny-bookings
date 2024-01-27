<?php

namespace App\Services;

class Utils
{
    public static function filter($query, $request)
    {
        $filters = [
            'title' => $request->input('title'),
            'minPrice' => floatval($request->input('minPrice')),
            'maxPrice' => floatval($request->input('maxPrice')),
            'date' => $request->input('date'),
            'userName' => $request->input('userName'),
            'userEmail' => $request->input('userEmail'),
        ];

        foreach ($filters as $key => $value) {
            if ($request->has($key) && $value) {
                switch ($key) {
                    case 'title':
                        $query->where($key, 'like', "%$value%");
                        break;
                    case 'userName':
                        $query->whereHas('user', function($q) use ($value){
                            $q->where('name', 'like', "%$value%");
                         });
                        break;
                    case 'userEmail':
                        $query->whereHas('user', function($q) use ($value){
                            $q->where('email', 'like', "%$value%");
                         });
                        break;
                    case 'minPrice':
                        $query->where('price', '>=', $value);
                        break;
                    case 'maxPrice':
                        $query->where('price', '<=', $value);
                        break;
                    case 'date':
                        $query->where('start_datetime', '<=', $value)->where('end_datetime', '>=', $value);
                        break;
                }
            }
        }

        return $query;
    }
}
