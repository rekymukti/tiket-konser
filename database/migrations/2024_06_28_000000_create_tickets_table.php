Schema::create('tickets', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->string('phone');
    $table->string('ticket_id')->unique();
    $table->boolean('is_checked_in')->default(false);
    $table->timestamps();
});
