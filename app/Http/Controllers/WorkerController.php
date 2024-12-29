<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil nilai pencarian dari input

        if ($search) {
            // Lakukan pencarian pada semua kolom yang relevan
            $workers = Worker::where('name', 'like', "%$search%")
                ->orWhere('position', 'like', "%$search%")
                ->orWhere('departement', 'like', "%$search%")
                ->orWhere('salary', 'like', "%$search%")
                ->orWhere('hire_date', 'like', "%$search%")
                ->paginate(5);
        } else {
            // Jika tidak ada pencarian, tampilkan semua data
            $workers = Worker::paginate(5); // Menampilkan 10 data per halaman
        }

        // Kirimkan hasil pencarian atau semua data ke view
        return view('main', compact('workers', 'search'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'position' => 'required|string|max:50',
            'departement' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
        ]);

        Worker::create($request->all());
        return redirect('/')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'position' => 'required|string|max:50',
            'departement' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
        ]);

        $worker = Worker::findOrFail($id);
        $worker->update($request->all());
        return redirect('/')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $worker = Worker::findOrFail($id); // Temukan data berdasarkan ID
        $worker->delete(); // Hapus data
        return redirect('/')->with('success', 'Data berhasil dihapus.');
    }


    public function show($id)
    {
        // Cari data berdasarkan ID
        $worker = Worker::findOrFail($id);

        // Kirim data ke view detail
        return view('workers.detail', compact('worker'));
    }

}

