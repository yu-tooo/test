<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use App\Models\Content;

class ContentController extends Controller
{
    public function inquire() 
    {
        $user = [
            'firstName' => null,
            'lastName' => null,
            'gender' => 1,
            'email' => null,
            'postcode' => null,
            'address' => null,
            'building_name' => null,
            'opinion' => null
        ];
        return view('inquire', ['user' => $user]);
    }

    public function reinquire(Request $request)
    {
        $firstName = strstr($request->fullname, ' ');
        $lastName = strstr($request->fullname, ' ', true);
        $user = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion
        ];
        return view('inquire', ['user' => $user]);
    }

    public function confirm(ContentRequest $request)
    {
        $user = [
            'fullname' => $request->lastName." ". $request->firstName,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => mb_convert_kana($request->postcode,'a'),
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];
        return view('confirm', ['user' => $user]);
    }

    public function thanks(Request $request)
    {
        $data = $request->all();
        Content::create($data);
        return view('thanks');
    }

    public function search()
    {
        $param = [
            'fullname' => null,
            'gender' => 0,
            'created_start' => null,
            'created_end' => null,
            'email' => null
        ];
        return view('management', $param);
    }

    public function result(Request $request) 
    {
        $fullname = $request->fullname;
        $gender = $request->gender;
        $createdStart = $request->created_start; 
        $createdEnd = $request->created_end;
        $email = $request->email;

        //createdEndの一日後を計算($createdEndOneDayAfter)
        $createdEndTimeStamp = strtotime($createdEnd);
        $createdEndOneDayAfter = date('Y-m-d', strtotime('+1 day', $createdEndTimeStamp));

        if($createdEnd) {
            if ($gender == 0) {
                $users = Content::where('fullname', 'LIKE BINARY', "%{$fullname}%")
                ->whereBetween('created_at', [$createdStart, $createdEndOneDayAfter])
                ->where('email', 'LIKE BINARY', "%{$email}%")
                ->paginate(10);
            } else {
                $users = Content::where('fullname', 'LIKE BINARY', "%{$fullname}%")
                ->where('gender', $gender)
                ->whereBetween('created_at', [$createdStart, $createdEndOneDayAfter])
                ->where('email', 'LIKE BINARY', "%{$email}%")
                ->paginate(10);
            } 
        } else {
            if ($gender == 0) {
                $users = Content::where('fullname', 'LIKE BINARY', "%{$fullname}%")
                ->where('email', 'LIKE BINARY', "%{$email}%")
                ->paginate(10);
            } else {
                $users = Content::where('fullname', 'LIKE BINARY', "%{$fullname}%")
                ->where('gender', $gender)
                ->where('email', 'LIKE BINARY', "%{$email}%")
                ->paginate(10);
            } 
        }

        

        $param = [
            'users' => $users,
            'fullname' => $fullname,
            'gender' => $gender,
            'created_start' => $createdStart,
            'created_end' => $createdEnd,
            'email' => $email,
        ];

        return view('management', $param);
    }

    public function delete(Request $request)
    {
        Content::where('id', $request->id)->delete();
        return redirect('/maker');
    }
}
