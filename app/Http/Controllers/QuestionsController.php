<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AskQuestionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;


class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public static function middleware(): array
    // {
    //     return [

    //         new Middleware(Auth::class, except: ['index', 'show']),
    //     ];
    // }

    public function __construct()
    {
        $this->middleware('auth', ['expect' => ['index', 'show']]);
    }

    public function index()
    {
        //
        $questions = Question::with('user')->latest()->paginate(5);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $question = new Question();
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));
        return redirect()->route('questions.index')->with('success', 'Your question has been submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $this->authorize('update', $question);

        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        $this->authorize('update', $question);

        $question->update($request->only('title', 'body'));
        return redirect()->route('questions.index')->with('success', 'Your Question has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);

        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Your Question has been Deleted');
    }
}
