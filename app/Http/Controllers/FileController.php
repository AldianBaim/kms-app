<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $files = File::where('status', 'Diterima')->get();
        return view('file.index', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'attachment' => 'required'
        ]);

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')->getClientOriginalName();
            $request->attachment->storeAs('public/files/', $attachment);

            File::create([
                'user_id'     => Auth::user()->id,
                'title'       => $request->title,
                'category'    => $request->category,
                'attachment'  => $attachment,
                'status'      => 'Ditunda'
            ]);

            $request->session()->flash('status', 'Berkas baru berhasil ditambahkan. Silahkan menunggu untuk persetujuan berkas.');
            return redirect('/berbagi-berkas');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $file = File::find($id);

        if ($request->hasFile('attachment')) {
            $new_attachment = $request->file('attachment')->getClientOriginalName();
            $request->attachment->storeAs('public/files/', $new_attachment);

            // Check filename same with current
            $check_file = basename(Storage::url("public/files/$file->attachment"));
            if($check_file != $new_attachment) {
                Storage::move("public/files/$file->attachment", "public/files/trash/$file->attachment");
            }
        }

        $file->update([
            'user_id'     => Auth::user()->id,
            'title'       => $request->title,
            'category'    => $request->category,
            'attachment'  => $new_attachment ?? $file->attachment,
            'status'      => $file->status,
        ]);

        $request->session()->flash('status', 'Berkas baru berhasil diupdate. silahkan menunggu untuk approval berkas');
        return redirect('/berbagi-berkas');
    }

    public function destroy(Request $request, $id)
    {
        File::where('id', $id)->delete();
        $request->session()->flash('status', 'Data berkas berhasil dihapus');
        return redirect('/berbagi-berkas');
    }
}
