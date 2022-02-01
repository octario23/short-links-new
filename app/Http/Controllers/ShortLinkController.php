<?php

namespace App\Http\Controllers;

use App\Jobs\ShortLinkJob;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();

        return view('shortenLink', compact('shortLinks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                               'link' => 'required|url'
                           ]);

        $shortLink = ShortLink::create(['link' => $request->link]);
        $shortLink->code = $this->getHashedCode($shortLink->id);
        $shortLink->save();


        ShortLinkJob::dispatch($shortLink);

        return redirect('generate-shorten-link')
            ->with('success', 'Shorten Link Generated Successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();

        return redirect($find->link);
    }

    public function mostVisited()
    {
        $mostViewed = DB::table('short_links')
            ->select('link', 'title', DB::raw('count(*) as views'))
            ->groupBy('link','title')
            ->orderBy('views', 'desc')
            ->limit(100)
            ->get();

        return view('mostViewed', compact('mostViewed'));

    }

    public function getHashedCode($id)
    {
        $codeset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $base = strlen($codeset);
        $n = $id;
        $converted = "";

        while ($n > 0) {
            $converted = substr($codeset, ($n % $base), 1) . $converted;
            $n = floor($n/$base);
        }

        return $converted;
    }
}
