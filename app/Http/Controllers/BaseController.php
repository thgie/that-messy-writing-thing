<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class BaseController extends Controller
{
    /**
     * Default view.
     *
     * @return Response
     */
    public function home()
    {
        $home = DB::table('pieces')->where('id', '1')->first();
        $ids = DB::table('pieces')->lists('id');
        return view('base', ['p' => $home, 'ids' => implode(',', $ids)]);
    }
    /**
     * Default view.
     *
     * @return Response
     */
    public function p($id)
    {
        $p = DB::table('pieces')->where('id', $id)->first();
        $ids = DB::table('pieces')->lists('id');
        return view('base', ['p' => $p, 'ids' => implode(',', $ids)]);
    }

    /**
     * Default view.
     *
     * @return Response
     */
    public function save(Request $request)
    {
        DB::table('pieces')
            ->where('id', $request->input('id'))
            ->update(
                ['content' => $request->input('content')]
            );

        return 'true';
    }

    /**
     * Default view.
     *
     * @return Response
     */
    public function bootstrap(Request $request)
    {
        $id = DB::table('pieces')->insertGetId(
            ['sources' => $request->input('sources')]
        );

        return $id;
    }

    /**
     * Default view.
     *
     * @return Response
     */
    public function addnew(Request $request)
    {
        $id = DB::table('pieces')->insertGetId(
            ['sources' => '']
        );

        return $id;
    }

    /**
     * Default view.
     *
     * @return Response
     */
    public function chain(Request $request)
    {
        $p = DB::table('pieces')->where('id', $request->input('chain'))->first();
        $sources = $p->sources . $request->input('sources');

        DB::table('pieces')
            ->where('id', $request->input('chain'))
            ->update(
                ['sources' => $sources]
            );

        return 'true';
    }
}
