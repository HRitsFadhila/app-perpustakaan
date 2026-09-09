<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        ['id' => 1, 'nama' => 'Ahmad Fauzi', 'nim' => '2104111001', 'email' => 'ahmad@student.com', 'nomor_telepon' => '081234567890', 'alamat' => 'Jl. Merdeka No. 10, Surabaya', 'status' => 'aktif'],
        ['id' => 2, 'nama' => 'Siti Aminah', 'nim' => '2104111002', 'email' => 'siti@student.com', 'nomor_telepon' => '089876543210', 'alamat' => 'Jl. Pahlawan No. 45, Surabaya', 'status' => 'aktif'],
        ['id' => 3, 'nama' => 'Budi Santoso', 'nim' => '2104111003', 'email' => 'budi@student.com', 'nomor_telepon' => '085612345678', 'alamat' => 'Jl. Pemuda No. 12, Surabaya', 'status' => 'nonaktif'],
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with('success', "Member \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = collect($this->members)->firstWhere('id', (int) $id);

        abort_if(! $member, 404);

        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = collect($this->members)->firstWhere('id', (int) $id);

        abort_if(! $member, 404);

        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'nomor_telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        return redirect()->route('members.index')
            ->with('success', "Member \"{$validated['nama']}\" berhasil diperbarui (data dummy, belum tersimpan ke database).");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('members.index')
            ->with('success', "Member dengan id {$id} berhasil dihapus (data dummy, belum tersimpan ke database).");
    }
}
