<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Inertia\Inertia;
use Inertia\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Book/Index', [
            'books' => Book::all(),
            'message' => session('msaage')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request): Redirector | RedirectResponse
    {
        $book = new Book($request->input());
        $book->save();

        return redirect('book')->with([
            'message' => '登録しました'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book): Redirector | RedirectResponse
    {
        $book->fill($request->input())->saveOrFail();

        return redirect('book')->with([
            'message' => '更新しました'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): Redirector | RedirectResponse
    {
        $book->delete();

        return redirect('book')->with([
            'message' => '削除しました'
        ]);
    }
}
