<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //

    public function index (){
        $users=User::latest()->paginate(10);
        return view('user.index',compact('users'));
    }

    public function create()
    {
        //
        
        return view('user.create');
    }


    public function store(Request $request)
    {
        //
        $data = $request->validate([  
            'nom'=>  'required',
            'prenom'=>  'required',
            'telephone'=>  'required',
            'email'=>  'required', 
            'password'=>  'required',
            'role'=>  'required',
            
        ]);

      
          $user=User::create([
        'nom'=>$request['nom'],
        'prenom'=>$request['prenom'],
        'telephone'=>$request['telephone'],
        'email'=>$request['email'],
        'password'=>Hash::make($request['password']),
        'role'=>$request['role'],
          ]);

        return redirect()->route('users.index')->with('message', 'utilisateur creer');
    
    }


    public function show($id)
    {
        //
        $user=user::find($id);
        //dd($user);
        
        return view('user.show',compact('user'));
    }


    public function edit($id)
    {
        //
         $user=User::find($id);
         
         return view('user.edit',compact('user'));
    }
    
    public function update(Request $request,$id)
    {
        //
        $data = $request->validate([  
            'nom'=>  'required',
            'prenom'=>  'required',
            'telephone'=>  'required',
            'email'=>  'required',   
            'role'=>  'required',
            
        ]);

      
          $user=User::find($id)->update($data);

        return redirect()->route('users.index')->with('message', 'utilisateur modifier');
    
    }

    public function desactiver($id){
        $user=User::find($id);
        if($user->status == "actif")
        {
            $user->update([
            'status'=>"desactiver"
        ]);
        
        return redirect()->route('users.index')->with('message', 'utilisateur desactiver');
        }else
        {
            $user->update([
                'status'=>"actif"
            ]);

            return redirect()->route('users.index')->with('message', 'utilisateur activer');
        }
        
        
    }
}
