<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\CaseFile;
use App\Models\Document;
use App\Models\Task;
use App\Models\Correspondence;
use App\Models\Deadline;
use App\Models\Billing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */


    public function run(): void
    {
        // Users
        $user1 = User::create([
            'name' => 'Anna Kovács',
            'email' => 'anna.kovacs@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $user2 = User::create([
            'name' => 'Béla Nagy',
            'email' => 'bela.nagy@example.com',
            'password' => bcrypt('password'),
            'role' => 'lawyer',
        ]);

        // Clients
        $client1 = Client::create([
            'name' => 'Gábor Szabó',
            'birth_date' => '1990-05-12',
            'birth_place' => 'Budapest',
        ]);

        $client2 = Client::create([
            'name' => 'Mária Tóth',
            'birth_date' => '1985-11-22',
            'birth_place' => 'Debrecen',
        ]);

        // CaseFiles
        $case1 = CaseFile::create([
            'client_name' => $client1->name,
            'opposing_party' => 'Cég XYZ Kft.',
            'title' => 'Szerződés jogvita',
            'type' => 'Civil',
            'user_id' => $user1->id,
        ]);

        $case2 = CaseFile::create([
            'client_name' => $client2->name,
            'opposing_party' => 'Kft. ABC',
            'title' => 'Munkaügyi vita',
            'type' => 'Administrative',
            'user_id' => $user2->id,
        ]);

        // Documents
        Document::create([
            'client_id' => $client1->id,
            'case_id' => $case1->id,
            'document_type' => 'contract',
            'file' => 'contracts/contract1.pdf',
        ]);

        Document::create([
            'client_id' => $client2->id,
            'case_id' => $case2->id,
            'document_type' => 'letter',
            'file' => 'letters/letter1.pdf',
        ]);

        // Tasks
        Task::create([
            'case_id' => $case1->id,
            'task' => 'Szerződés átnézése',
        ]);

        Task::create([
            'case_id' => $case2->id,
            'task' => 'Munkaügyi dokumentumok ellenőrzése',
        ]);

        // Correspondences
        Correspondence::create([
            'case_id' => $case1->id,
            'status' => 'sent',
        ]);

        Correspondence::create([
            'case_id' => $case2->id,
            'status' => 'received',
        ]);

        // Deadlines
        Deadline::create([
            'case_id' => $case1->id,
            'client_id' => $client1->id,
            'date' => '2026-03-25',
        ]);

        Deadline::create([
            'case_id' => $case2->id,
            'client_id' => $client2->id,
            'date' => '2026-03-28',
        ]);

        // Billings
        Billing::create([
            'template_text' => 'Havi díj számlázás',
            'client_id' => $client1->id,
            'case_id' => $case1->id,
            'month' => 'March',
        ]);

        Billing::create([
            'template_text' => 'Havi díj számlázás',
            'client_id' => $client2->id,
            'case_id' => $case2->id,
            'month' => 'March',
        ]);
    }
}
