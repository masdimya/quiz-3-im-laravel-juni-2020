<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ArtikelModel as Artikel;
use App\Models\TagModel as Tag;

class ArtikelController extends Controller
{
    public function index()
    {
        $articles = Artikel::all();
        return view('pages.article-list',['articles'=>$articles]);
    }

    public function addForm()
    {
        return view('pages.article-form',['url'=>route('artikel.add'),'title'   => 'Tambah Artikel']);
    }

    public function store(Request $request){
        $user_id = 1; 
        $judul   = $request->input('judul');
        $slug    = str_replace(" ","-",strtolower($judul));
        $isi     = $request->input('artikel');
        $tags     = explode(",",$request->input('tag'));
        
        $dataArtikel = [
            'user_id' => $user_id,
            'judul' => $judul,
            'isi'   => $isi,
            'slug'  => $slug,
        ];

        $artikel = Artikel::create($dataArtikel);

        foreach ($tags as $tag) {
            # code...
            $dataTag[] = [
                        'article_id' => $artikel->id,
                        'name'       => $tag
                    
            ];
        }
        
        Tag::insert($dataTag);

        return redirect()->route('artikel.index');
    }

    public function detail($id){
        $article = Artikel::find($id);
        $tags    = Tag::where('article_id',$article->id)->get();
        $data   = [
                    'article' => $article,
                    'tags'    => $tags,
        ];

        return view('pages.article-details',$data);
    }

    public function editForm($id)
    {
        $article = Artikel::find($id);
        $tags    = Tag::where('article_id',$article->id)->get();

        $combineTag = "";
        foreach ($tags as $i => $tag) {
            if($i == count($tags) - 1){
                $combineTag .= $tag->name;
            }
            else{
                $combineTag .= $tag->name . ",";
            }
        }
        // dd($combineTag);
        $data   = [
                    'title'   => 'Edit Artikel',
                    'article' => $article,
                    'tag'    => $combineTag,
                    'url'     => route('artikel.edit',['id'=>$id])
        ];
        
        return view('pages.article-form',$data);
    }

    public function update($id,Request $request)
    {
        $judul   = $request->input('judul');
        $slug    = str_replace(" ","-",strtolower($judul));
        $isi     = $request->input('artikel');
        $tags    = explode(",",$request->input('tag'));

        $article = Artikel::find($id);

        $article->judul   = $judul;
        $article->isi     = $isi;
        $article->slug    = $slug;

        $article->save();

        $deletedRows = Tag::where('article_id', $id)->delete();

        foreach ($tags as $tag) {
            # code...
            $dataTag[] = [
                        'article_id' => $id,
                        'name'       => $tag
                    
            ];
        }
        
        Tag::insert($dataTag);
        return redirect()->route('artikel.index');

    }
    public function destroy($id)
    {
        Artikel::find($id)->delete();
        Tag::where('article_id', $id)->delete();
        return redirect()->route('artikel.index');
    }
}
