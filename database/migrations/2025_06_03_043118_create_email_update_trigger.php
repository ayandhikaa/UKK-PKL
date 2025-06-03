<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateEmailUpdateTrigger extends Migration
{
    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_siswa_email;');
        DB::unprepared('DROP TRIGGER IF EXISTS update_guru_email;');

        DB::unprepared('
            CREATE TRIGGER update_siswa_email
            AFTER UPDATE ON users
            FOR EACH ROW
            BEGIN
                IF OLD.email != NEW.email THEN
                    UPDATE siswas
                    SET siswas.email = NEW.email
                    WHERE siswas.email = OLD.email;
                END IF;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER update_guru_email
            AFTER UPDATE ON users
            FOR EACH ROW
            BEGIN
                IF OLD.email != NEW.email THEN
                    UPDATE gurus
                    SET gurus.email = NEW.email
                    WHERE gurus.email = OLD.email;
                END IF;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_siswa_email;');
        DB::unprepared('DROP TRIGGER IF EXISTS update_guru_email;');
    }
}
