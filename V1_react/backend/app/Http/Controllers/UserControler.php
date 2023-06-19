<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserControler extends Controller
{
    // get all users
    public function getUsers(){
        $users = User::all();
        if($users) {
            return response()->json(['number' => count($users),'user' => $users], 201);
        }

        return response()->json(['message' => 'something happen maybe user not found'], 404);
    }

    // get one user by his id
    public function getSpicificeUser($id){
        $user = User::find($id);
        if($user) {
            return response()->json(['user' => $user], 201);
        }

        return response()->json(['message' => 'something happen maybe user not found'], 404);

    }

    
    // delete user bu his id
    public function destroy($id)
    {
        if (User::destroy($id)){
            return response()->json(['message' => ' user deleted sucssefuly'], 201);
        }
        
        return response()->json(['message' => ' something happen maybe user not found'], 404);

    }



    // update user by his id
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user){
            $user->update($request->all());
            return response()->json(['message' => ' user updated sucssefuly','User' => $user], 201);
        }
        
        return response()->json(['message' => ' something happen maybe user not found'], 404);
        // return $request->all();

    }


    // search user by his name
    public function search($name)
    {
        $user = User::where('username', 'like', '%'.$name.'%')->get();
        if ($user){
            return response()->json(['User' => $user], 201);
        }
        
        return response()->json(['message' => ' something happen maybe user not found'], 404);
        // return $request->all();

    }
}
