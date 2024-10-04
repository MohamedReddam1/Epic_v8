<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\formation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Notification;


class orderController extends Controller
{
    public function AddToOrder(Request $r)
    {
        $currentDateTime = now();
        $id_formation = $r->input('id_formation');
        $totalprice = $r->input('total');
        $id_user = auth()->user()->id;


        $order = new Order();
        $order->id_user = $id_user;
        $order->id_formation = $id_formation;
        $order->montant_paye = $totalprice;
        $order->date_d_achat = $currentDateTime;
        $order->save();


        $formation = formation::find($id_formation); 
        $titre = $formation->titre; 
        $id_formateur = $formation->id_user; 
        $formateur = User::find($id_formateur); 
        $formateur_name = $formateur->name; 
 
 
        $user = User::find($id_user); 
        $name = $user->name; 
 
 
        $notification = new Notification(); 
        $notification->id_user = $id_user; 
        $notification->content = 'hello ' . $name . ', you had just baught, ' . $titre . ' course, from ' . $formateur_name . ', enjoooy the course'; 
        $notification->save();

        return redirect('/home')->with('successOrder','you successfully made the transaction');
    }
}
