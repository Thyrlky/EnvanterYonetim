<?php

namespace App\Http\Middleware\Material;

use Closure;
use Illuminate\Http\Request;
use App\Models\Material\MaterialType;

class MaterialTypeUpdate
{
    public function handle(Request $request, Closure $next)
    {
        $control = MaterialType::find($request->id);
        if($control == NULL){
            return redirect()->back()->withCookie(cookie('error','İşlem Sırasında Hata!',0.02));
        }
        if($request->old_name == $request->name){
            return redirect()->back()->withCookie(cookie('error','Bir Değişiklik Yapmadınız!',0.02));
        }
        else{
            $control = MaterialType::where('name',$request->name)->first();
            if($control != NULL){
                return redirect()->back()->withCookie(cookie('error','Tip Adı Kullanılıyor!',0.02));
            }
        }
        return $next($request);
    }
}
