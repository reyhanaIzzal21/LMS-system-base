<?php

namespace App\Http\Controllers\Program;

use App\Models\User;
use App\Models\Program;
use App\Models\ProgramTeacher;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class ProgramTeacherController extends Controller
{
    /**
     * Get available teachers that are not yet assigned to this program.
     */
    public function getAvailableTeachers(string $programId): JsonResponse
    {
        $program = Program::findOrFail($programId);

        // Get IDs of teachers already assigned to this program
        $assignedTeacherIds = $program->teachers()->pluck('users.id')->toArray();

        // Get all users with 'teacher' role who are not assigned to this program
        $availableTeachers = User::role('teacher')
            ->whereNotIn('id', $assignedTeacherIds)
            ->select('id', 'name', 'email')
            ->orderBy('name')
            ->get()
            ->map(function ($teacher) {
                return [
                    'id' => $teacher->id,
                    'text' => $teacher->name . ' (' . $teacher->email . ')'
                ];
            });

        return response()->json([
            'results' => $availableTeachers
        ]);
    }

    /**
     * Store new teachers to the program.
     */
    public function store(Request $request, string $programId): RedirectResponse
    {
        $request->validate([
            'teacher_ids' => 'required|array|min:1',
            'teacher_ids.*' => 'exists:users,id'
        ]);

        $program = Program::findOrFail($programId);

        // Get existing teacher IDs for this program
        $existingTeacherIds = $program->teachers()->pluck('users.id')->toArray();

        // Filter out already assigned teachers
        $newTeacherIds = array_filter($request->teacher_ids, function ($id) use ($existingTeacherIds) {
            return !in_array($id, $existingTeacherIds);
        });

        // Attach new teachers
        foreach ($newTeacherIds as $teacherId) {
            ProgramTeacher::create([
                'program_id' => $program->id,
                'user_id' => $teacherId,
            ]);
        }

        $count = count($newTeacherIds);

        return redirect()
            ->back()
            ->with('success', $count . ' guru berhasil ditambahkan ke program.');
    }

    /**
     * Remove a teacher from the program.
     */
    public function destroy(string $programId, string $userId): RedirectResponse
    {
        $deleted = ProgramTeacher::where('program_id', $programId)
            ->where('user_id', $userId)
            ->delete();

        if ($deleted) {
            return redirect()
                ->back()
                ->with('success', 'Guru berhasil dihapus dari program.');
        }

        return redirect()
            ->back()
            ->with('error', 'Guru tidak ditemukan di program ini.');
    }
}
