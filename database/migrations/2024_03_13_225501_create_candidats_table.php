    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('candidats', function (Blueprint $table) {
                $table->id()->uniqid();
                $table->foreignId('user_id')->unique()->constrained('users');
                $table->string('profession');
                $table->string('nom');
                $table->string('prenom');
                $table->string('image')->default('/default/avatart.jpg');
                $table->string('tel');
                $table->enum('genre',['Homme','Femme']);
                $table->date('date_naiss');
                $table->string('cv');
                $table->boolean('verif')->nullable();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('candidats');
        }
    };
