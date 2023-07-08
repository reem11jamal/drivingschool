<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    //
    public function createQuestion(Request $request){
        $request->validate([
            "question" => "required",
            "answer" => "required",
            "choice1" => "required",
            "choice2" => "required",
            "choice3" => "required",
            "mark" => "required",
        ]);

        // create data
        $question = new Question();

        $question->question = $request->question;
        $question->answer = $request->answer;
        $question->choice1 = $request->choice1;
        $question->choice2 = $request->choice2;
        $question->choice3 = $request->choice3;
        $question->mark = $request->mark;


        $question->save();

        // send response
        return response()->json([
            "status" => 1,
            "message" => "question created successfuly" 
        ]);
    }

    public function listQuestions(){
        $questions = Question::get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Questions: ",
            "data" => $questions
        ],200);
    }

    public function getSingleQuestion($id){
        if(Question::where("id", $id)->exists()){
           
            $question_details = Question::where("id", $id)->first();
            return response()->json([
                "status" => 1,
                "message" => "Question found ",
                "data" => $question_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Question not found"
            ],404);
        }
    }
    public function deleteQuestion($id){
        if(Question::where("id", $id)->exists()){
           
            $question = Question::find($id);

            $question->delete();

            return response()->json([
                "status" => 1,
                "message" => "Question deleted successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Question not found"
            ],404);
        }
    
    }
}
