<?php


namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Book;
use Validator;
final class BookController extends BaseController
{
    
//read from database

public function index(Request $request){
   
    $book=Book::all();
    return $this->sendResponse($book->toArray(),'books read succesfuly');


}


public function store(Request $request){
    $input = $request->all();
    $validator = Validator::Make($input,[
        'name'=>['required'],
        'writer'=>['required'],
        'info'=>['required'],
    ]);
    if($validator->fails()){
        return $this->sendError('error validation',$validator->errors());

    }

    $book=Book::create($input);
    return $this->sendResponse($book->toArray(),'book created done');

}



public function show($id){
    $book = Book::find($id);
    if(is_null($book)){
        return $this->sendError('book not found');
    }
    return $this->sendResponse($book->toArray(),'book is found');
}



public function update(Request $request, $bookId)
{
    // ابحث عن الكتاب باستخدام الـ ID
    $book = Book::find($bookId);

    if (!$book) {
        return response()->json(['message' => 'Book not found'], 404);
    }

    // تحقق من أن الاسم ليس فارغًا
    $name = $request->input('name');
    if (is_null($name)) {
        return response()->json(['message' => 'The name field cannot be null'], 400);
    }

    // قم بتحديث المعلومات
    $book->name = $request->input('name');
    $book->writer = $request->input('writer');
    $book->info = $request->input('info');
    // قم بتحديث المزيد من الحقول حسب احتياجاتك

    $book->save();

    return response()->json(['message' => 'Book information updated successfully']);
}

    public function destroy(book $book){

        $book->delete();
        return $this->sendResponse($book->toArray(),'book deleted done');

    }


}




//T@$dIGaIgKx$
//2251258869